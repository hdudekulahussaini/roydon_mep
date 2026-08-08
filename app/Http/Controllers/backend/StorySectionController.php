<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\StorySection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StorySectionController extends Controller
{
    public function index()
    {
        $storySections = StorySection::latest()->paginate(10);

        return view(
            'backend.pages.story_sections.index',
            compact('storySections')
        );
    }

    public function create()
    {
        return view(
            'backend.pages.story_sections.create'
        );
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => [
                'required',
                'string',
                'max:255',
            ],

            'image' => [
                'required',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048',
            ],

            'description' => [
                'required',
                'string',
            ],

            'status' => [
                'nullable',
                'boolean',
            ],
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request
                ->file('image')
                ->store('story-sections', 'public');
        }

        $validated['status'] = $request->boolean('status');

        StorySection::create($validated);

        return redirect()
            ->route('admin.story-sections.index')
            ->with('success', 'Story section created successfully.');
    }

    public function edit(StorySection $storySection)
    {
        return view(
            'backend.pages.story_sections.edit',
            compact('storySection')
        );
    }

    public function update(
        Request $request,
        StorySection $storySection
    ) {
        $validated = $request->validate([
            'title' => [
                'required',
                'string',
                'max:255',
            ],

            'image' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048',
            ],

            'description' => [
                'required',
                'string',
            ],

            'status' => [
                'nullable',
                'boolean',
            ],
        ]);

        if ($request->hasFile('image')) {

            if ($storySection->image) {
                Storage::disk('public')->delete(
                    $storySection->image
                );
            }

            $validated['image'] = $request
                ->file('image')
                ->store('story-sections', 'public');
        }

        $validated['status'] = $request->boolean('status');

        $storySection->update($validated);

        return redirect()
            ->route('admin.story-sections.index')
            ->with('success', 'Story section updated successfully.');
    }

    public function destroy(StorySection $storySection)
    {
        if ($storySection->image) {
            Storage::disk('public')->delete(
                $storySection->image
            );
        }

        $storySection->delete();

        return redirect()
            ->route('admin.story-sections.index')
            ->with('success', 'Story section deleted successfully.');
    }
}