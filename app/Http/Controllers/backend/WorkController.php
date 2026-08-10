<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Work;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WorkController extends Controller
{
    /**
     * Display all works.
     */
    public function index()
    {
        $works = Work::orderBy('sort_order')
            ->orderBy('id')
            ->paginate(10);

        return view(
            'backend.pages.works.index',
            compact('works')
        );
    }

    /**
     * Show create form.
     */
    public function create()
    {
        return view('backend.pages.works.create');
    }

    /**
     * Store new work.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'image' => [
                'required',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048',
            ],

            'subtitle' => [
                'required',
                'string',
                'max:255',
            ],

            'title' => [
                'required',
                'string',
                'max:255',
            ],

            'sort_order' => [
                'nullable',
                'integer',
                'min:0',
            ],

            'status' => [
                'nullable',
                'boolean',
            ],
        ]);

        if ($request->hasFile('image')) {

            $validated['image'] =
                $request->file('image')
                    ->store('works', 'public');
        }

        $validated['sort_order'] =
            $validated['sort_order'] ?? 0;

        $validated['status'] =
            $request->boolean('status');

        Work::create($validated);

        return redirect()
            ->route('admin.works.index')
            ->with(
                'success',
                'Work created successfully.'
            );
    }

    /**
     * Show edit form.
     */
    public function edit(Work $work)
    {
        return view(
            'backend.pages.works.edit',
            compact('work')
        );
    }

    /**
     * Update work.
     */
    public function update(
        Request $request,
        Work $work
    ) {
        $validated = $request->validate([
            'image' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048',
            ],

            'subtitle' => [
                'required',
                'string',
                'max:255',
            ],

            'title' => [
                'required',
                'string',
                'max:255',
            ],

            'sort_order' => [
                'nullable',
                'integer',
                'min:0',
            ],

            'status' => [
                'nullable',
                'boolean',
            ],
        ]);

        if ($request->hasFile('image')) {

            if (
                $work->image &&
                Storage::disk('public')->exists($work->image)
            ) {
                Storage::disk('public')
                    ->delete($work->image);
            }

            $validated['image'] =
                $request->file('image')
                    ->store('works', 'public');
        }

        $validated['sort_order'] =
            $validated['sort_order'] ?? 0;

        $validated['status'] =
            $request->boolean('status');

        $work->update($validated);

        return redirect()
            ->route('admin.works.index')
            ->with(
                'success',
                'Work updated successfully.'
            );
    }

    /**
     * Delete work.
     */
    public function destroy(Work $work)
    {
        if (
            $work->image &&
            Storage::disk('public')->exists($work->image)
        ) {
            Storage::disk('public')
                ->delete($work->image);
        }

        $work->delete();

        return redirect()
            ->route('admin.works.index')
            ->with(
                'success',
                'Work deleted successfully.'
            );
    }
}
