<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\StandardBanner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class StandardBannerController extends Controller
{
    /**
     * Display all standard banners.
     */
    public function index()
    {
        $banners = DB::table('standard_banners')
            ->latest('created_at')
            ->paginate(10);

        return view(
            'backend.pages.standard_banners.index',
            compact('banners')
        );
    }

    /**
     * Show create form.
     */
    public function create()
    {
        return view(
            'backend.pages.standard_banners.create'
        );
    }

    /**
     * Store banner.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'image' => [
                'required',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:5120',
            ],
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')
                ->store('standards-banners', 'public');
        }

        DB::table('standard_banners')->insert([
            'image' => $validated['image'],
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()
            ->route('admin.standard-banners.index')
            ->with(
                'success',
                'Standards banner created successfully.'
            );
    }

    /**
     * Show edit form.
     */
    public function edit(StandardBanner $standardBanner)
    {
        return view(
            'backend.pages.standard_banners.edit',
            compact('standardBanner')
        );
    }

    /**
     * Update banner.
     */
    public function update(
        Request $request,
        StandardBanner $standardBanner
    ) {
        $validated = $request->validate([
            'image' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:5120',
            ],
        ]);

        $data = [
            'updated_at' => now(),
        ];

        if ($request->hasFile('image')) {

            if (
                $standardBanner->image &&
                Storage::disk('public')->exists($standardBanner->image)
            ) {
                Storage::disk('public')->delete($standardBanner->image);
            }

            $data['image'] = $request->file('image')
                ->store('standards-banners', 'public');
        }

        DB::table('standard_banners')
            ->where('id', $standardBanner->id)
            ->update($data);

        return redirect()
            ->route('admin.standard-banners.index')
            ->with(
                'success',
                'Standards banner updated successfully.'
            );
    }

    /**
     * Delete banner.
     */
    public function destroy(StandardBanner $standardBanner)
    {
        if (
            $standardBanner->image &&
            Storage::disk('public')->exists($standardBanner->image)
        ) {
            Storage::disk('public')->delete($standardBanner->image);
        }

        DB::table('standard_banners')
            ->where('id', $standardBanner->id)
            ->delete();

        return redirect()
            ->route('admin.standard-banners.index')
            ->with(
                'success',
                'Standards banner deleted successfully.'
            );
    }
}