<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\HomeBanner;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class HomeBannerController extends Controller
{
    /**
     * Display all home banners.
     */
    public function index(): View
    {
        $banners = HomeBanner::query()
            ->latest()
            ->paginate(10);

        return view(
            'backend.pages.home-banners.index',
            compact('banners')
        );
    }

    /**
     * Show create form.
     */
    public function create(): View|RedirectResponse
    {
        if (HomeBanner::exists()) {
            flash()->error('Only one home banner is allowed. Please edit the existing one.');
        return redirect()->route('admin.home-banners.index');
        }

        return view('backend.pages.home-banners.create');
    }

    /**
     * Save a new banner.
     */
    public function store(Request $request): RedirectResponse
    {
        if (HomeBanner::exists()) {
            flash()->error('Only one home banner is allowed.');
        return redirect()->route('admin.home-banners.index');
        }

        $validated = $request->validate(
            $this->validationRules()
        );

        $validated['specializations'] = $this->prepareSpecializations(
            $request->input('specializations')
        );

        foreach (['iso_9001', 'iso_14001', 'iso_45001'] as $prefix) {
            $part1 = $request->input("{$prefix}_title_part1");
            $part2 = $request->input("{$prefix}_title_part2");
            $validated["{$prefix}_title"] = trim($part1).'|'.trim($part2);
            unset($validated["{$prefix}_title_part1"], $validated["{$prefix}_title_part2"]);
        }

        foreach ($this->imageFolders() as $field => $folder) {
            $validated[$field] = $request
                ->file($field)
                ->store($folder, 'public');
        }

        HomeBanner::create($validated);

        flash()->success('Home banner created successfully.');
        return redirect()->route('admin.home-banners.index');
    }

    /**
     * Show edit form.
     */
    public function edit(HomeBanner $homeBanner): View
    {
        return view(
            'backend.pages.home-banners.edit',
            compact('homeBanner')
        );
    }

    /**
     * Update banner.
     */
    public function update(
        Request $request,
        HomeBanner $homeBanner
    ): RedirectResponse {
        $validated = $request->validate(
            $this->validationRules(true)
        );

        $validated['specializations'] = $this->prepareSpecializations(
            $request->input('specializations')
        );

        foreach (['iso_9001', 'iso_14001', 'iso_45001'] as $prefix) {
            $part1 = $request->input("{$prefix}_title_part1");
            $part2 = $request->input("{$prefix}_title_part2");
            $validated["{$prefix}_title"] = trim($part1).'|'.trim($part2);
            unset($validated["{$prefix}_title_part1"], $validated["{$prefix}_title_part2"]);
        }

        foreach ($this->imageFolders() as $field => $folder) {
            if ($request->hasFile($field)) {
                $this->deleteImage($homeBanner->{$field});

                $validated[$field] = $request
                    ->file($field)
                    ->store($folder, 'public');
            } else {
                // Keep the existing image.
                unset($validated[$field]);
            }
        }

        $homeBanner->update($validated);

        flash()->success('Home banner updated successfully.');
        return redirect()->route('admin.home-banners.index');
    }

    /**
     * Delete banner and uploaded images.
     */
    public function destroy(
        HomeBanner $homeBanner
    ): RedirectResponse {
        foreach (array_keys($this->imageFolders()) as $field) {
            $this->deleteImage($homeBanner->{$field});
        }

        $homeBanner->delete();

        flash()->success('Home banner deleted successfully.');
        return redirect()->route('admin.home-banners.index');
    }

    /**
     * Validation rules.
     */
    private function validationRules(
        bool $updating = false
    ): array {
        $imageRequirement = $updating
            ? 'nullable'
            : 'required';

        return [
            'title' => [
                'required',
                'string',
                'max:255',
            ],

            'description' => [
                'required',
                'string',
            ],

            'background_image' => [
                $imageRequirement,
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:4096',
            ],

            'specializations' => [
                'nullable',
                'string',
            ],

            'iso_9001_title_part1' => [
                'required',
                'string',
                'max:128',
            ],

            'iso_9001_title_part2' => [
                'required',
                'string',
                'max:128',
            ],

            'iso_9001_image' => [
                $imageRequirement,
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048',
            ],

            'iso_14001_title_part1' => [
                'required',
                'string',
                'max:128',
            ],

            'iso_14001_title_part2' => [
                'required',
                'string',
                'max:128',
            ],

            'iso_14001_image' => [
                $imageRequirement,
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048',
            ],

            'iso_45001_title_part1' => [
                'required',
                'string',
                'max:128',
            ],

            'iso_45001_title_part2' => [
                'required',
                'string',
                'max:128',
            ],

            'iso_45001_image' => [
                $imageRequirement,
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048',
            ],
        ];
    }

    /**
     * Image storage folders.
     */
    private function imageFolders(): array
    {
        return [
            'background_image' => 'home-banners/backgrounds',
            'iso_9001_image' => 'home-banners/certificates',
            'iso_14001_image' => 'home-banners/certificates',
            'iso_45001_image' => 'home-banners/certificates',
        ];
    }

    /**
     * Convert comma-separated specializations to array.
     */
    private function prepareSpecializations(
        ?string $value
    ): array {
        if (blank($value)) {
            return [];
        }

        return array_values(
            array_filter(
                array_map('trim', explode(',', $value))
            )
        );
    }

    /**
     * Delete uploaded image.
     */
    private function deleteImage(?string $path): void
    {
        if (
            $path &&
            Storage::disk('public')->exists($path)
        ) {
            Storage::disk('public')->delete($path);
        }
    }
}
