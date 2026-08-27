<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Coverage;
use Illuminate\Http\Request;

class CoverageController extends Controller
{
    /**
     * Display all coverage locations.
     */
    public function index()
    {
        $coverages = Coverage::orderBy('sort_order')
            ->latest('id')
            ->paginate(10);

        return view(
            'backend.pages.coverage.index',
            compact('coverages')
        );
    }

    /**
     * Show create form.
     */
    public function create()
    {
        return view(
            'backend.pages.coverage.create'
        );
    }

    /**
     * Store coverage location.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'city' => [
                'required',
                'string',
                'max:100',
            ],

            'state' => [
                'required',
                'string',
                'max:100',
            ],

            'status' => [
                'nullable',
                'boolean',
            ],

            'sort_order' => [
                'nullable',
                'integer',
                'min:0',
            ],
        ]);

        $validated['status'] = $request->boolean('status');

        $validated['sort_order'] =
            $validated['sort_order'] ?? 0;

        Coverage::create($validated);

        return redirect()
            ->route('admin.coverages.index')
            ->with(
                'success',
                'Coverage location created successfully.'
            );
    }

    /**
     * Show edit form.
     */
    public function edit(Coverage $coverage)
    {
        return view(
            'backend.pages.coverage.edit',
            compact('coverage')
        );
    }

    /**
     * Update coverage location.
     */
    public function update(
        Request $request,
        Coverage $coverage
    ) {
        $validated = $request->validate([
            'city' => [
                'required',
                'string',
                'max:100',
            ],

            'state' => [
                'required',
                'string',
                'max:100',
            ],

            'status' => [
                'nullable',
                'boolean',
            ],

            'sort_order' => [
                'nullable',
                'integer',
                'min:0',
            ],
        ]);

        $validated['status'] = $request->boolean('status');

        $validated['sort_order'] =
            $validated['sort_order'] ?? 0;

        $coverage->update($validated);

        return redirect()
            ->route('admin.coverages.index')
            ->with(
                'success',
                'Coverage location updated successfully.'
            );
    }

    /**
     * Delete coverage location.
     */
    public function destroy(Coverage $coverage)
    {
        $coverage->delete();

        return redirect()
            ->route('admin.coverages.index')
            ->with(
                'success',
                'Coverage location deleted successfully.'
            );
    }
}
