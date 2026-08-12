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
        if (StorySection::count() >= 1) {
            flash()->warning('A story section already exists. You can only edit the existing one.');
            return redirect()->route('admin.story-sections.index');
        }

        return view(
            'backend.pages.story_sections.create'
        );
    }

    public function store(Request $request)
    {
        if (StorySection::count() >= 1) {
            flash()->error('A story section already exists. You can only edit the existing one.');
            return redirect()->route('admin.story-sections.index');
        }

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

        flash()->success('Story section created successfully.');
        return redirect()->route('admin.story-sections.index');
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

        flash()->success('Story section updated successfully.');
        return redirect()->route('admin.story-sections.index');
    }

    public function destroy(StorySection $storySection)
    {
        if ($storySection->image) {
            Storage::disk('public')->delete(
                $storySection->image
            );
        }

        $storySection->delete();

        flash()->success('Story section deleted successfully.');
        return redirect()->route('admin.story-sections.index');
    }
}
