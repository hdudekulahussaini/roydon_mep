<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\StandardSection;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class StandardSectionController extends Controller
{
    /**
     * Display all standard sections.
     */
    public function index(): View
    {
        $sections = StandardSection::withCount('standards')
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        return view(
            'backend.pages.standard_sections.index',
            compact('sections')
        );
    }

    /**
     * Show create form.
     */
    public function create(): View
    {
        return view(
            'backend.pages.standard_sections.create'
        );
    }

    /**
     * Store section.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
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

        $validated['sort_order'] =
            $validated['sort_order'] ?? 0;

        $validated['status'] =
            $request->boolean('status');

        StandardSection::create($validated);

        return redirect()
            ->route('admin.standard-sections.index')
            ->with('success', 'Standard section created successfully.');
    }

    /**
     * Show edit form.
     */
    public function edit(StandardSection $standardSection): View
    {
        return view(
            'backend.pages.standard_sections.edit',
            compact('standardSection')
        );
    }

    /**
     * Update section.
     */
    public function update(
        Request $request,
        StandardSection $standardSection
    ): RedirectResponse {
        $validated = $request->validate([
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

        $validated['sort_order'] =
            $validated['sort_order'] ?? 0;

        $validated['status'] =
            $request->boolean('status');

        $standardSection->update($validated);

        return redirect()
            ->route('admin.standard-sections.index')
            ->with('success', 'Standard section updated successfully.');
    }

    /**
     * Delete section.
     */
    public function destroy(
        StandardSection $standardSection
    ): RedirectResponse {
        $standardSection->delete();

        return redirect()
            ->route('admin.standard-sections.index')
            ->with('success', 'Standard section deleted successfully.');
    }
}