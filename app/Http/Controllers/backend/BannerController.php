<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class BannerController extends Controller
{
    /**
     * Display a listing of the banners.
     */
    public function index(): View
    {
        $banners = Banner::latest()->paginate(10);

        return view('backend.pages.banners.index', compact('banners'));
    }

    /**
     * Show the form for creating a new banner.
     */
    public function create(): View
    {
        return view('backend.pages.banners.create');
    }

    /**
     * Store a newly created banner in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $this->validateBanner($request);

        if ($request->hasFile('banner_image')) {
            $validated['image_path'] = $request->file('banner_image')->store('banners', 'public');
        }

        Banner::create($validated);

        flash()->success('Banner created successfully.');
        return redirect()->route('admin.banners.index');
    }

    /**
     * Show the form for editing the specified banner.
     */
    public function edit(Banner $banner): View
    {
        return view('backend.pages.banners.edit', compact('banner'));
    }

    /**
     * Update the specified banner in storage.
     */
    public function update(Request $request, Banner $banner): RedirectResponse
    {
        $validated = $this->validateBanner($request, $banner->id);

        if ($request->hasFile('banner_image')) {
            if ($banner->image_path) {
                Storage::disk('public')->delete($banner->image_path);
            }
            $validated['image_path'] = $request->file('banner_image')->store('banners', 'public');
        } elseif ($request->page_name !== 'projects') {
            // Remove image if changed from projects to something else, though unique page_name constraint
            // usually means we don't change page_name, but just in case.
        }

        $banner->update($validated);

        flash()->success('Banner updated successfully.');
        return redirect()->route('admin.banners.index');
    }

    /**
     * Remove the specified banner from storage.
     */
    public function destroy(Banner $banner): RedirectResponse
    {
        if ($banner->image_path) {
            Storage::disk('public')->delete($banner->image_path);
        }

        $banner->delete();

        flash()->success('Banner deleted successfully.');
        return redirect()->route('admin.banners.index');
    }

    /**
     * Validate the banner request.
     */
    private function validateBanner(Request $request, ?int $bannerId = null): array
    {
        $rules = [
            'page_name' => [
                'required',
                'string',
                Rule::unique('banners')->ignore($bannerId),
            ],
            'heading' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'banner_image' => 'nullable|image|max:2048',
        ];

        if ($request->page_name === 'projects') {
            $rules['banner_image'] = $bannerId ? 'nullable|image|max:2048' : 'required|image|max:2048';
            $rules['description'] = 'nullable';
        } else {
            $rules['description'] = 'required|string';
            $rules['banner_image'] = 'nullable';
        }

        return $request->validate($rules);
    }
}
