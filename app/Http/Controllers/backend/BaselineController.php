<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Baseline;
use Illuminate\Http\Request;

class BaselineController extends Controller
{
    /**
     * Display all compliance baseline items.
     */
    public function index()
    {
        $baselines = Baseline::orderBy('sort_order')
            ->paginate(10);

        return view(
            'backend.pages.baselines.index',
            compact('baselines')
        );
    }

    /**
     * Show create form.
     */
    public function create()
    {
        return view(
            'backend.pages.baselines.create'
        );
    }

    /**
     * Store new baseline.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([

            'title' => [
                'required',
                'string',
                'max:255',
            ],

            'description' => [
                'required',
                'string',
            ],

            'sort_order' => [
                'required',
                'integer',
                'min:1',
            ],

            'status' => [
                'nullable',
                'boolean',
            ],

        ]);

        $validated['status'] =
            $request->boolean('status');

        Baseline::create($validated);

        return redirect()
            ->route('admin.baselines.index')
            ->with(
                'success',
                'Compliance baseline created successfully.'
            );
    }

    /**
     * Show edit form.
     */
    public function edit(Baseline $baseline)
    {
        return view(
            'backend.pages.baselines.edit',
            compact('baseline')
        );
    }

    /**
     * Update baseline.
     */
    public function update(
        Request $request,
        Baseline $baseline
    ) {
        $validated = $request->validate([

            'title' => [
                'required',
                'string',
                'max:255',
            ],

            'description' => [
                'required',
                'string',
            ],

            'sort_order' => [
                'required',
                'integer',
                'min:1',
            ],

            'status' => [
                'nullable',
                'boolean',
            ],

        ]);

        $validated['status'] =
            $request->boolean('status');

        $baseline->update($validated);

        return redirect()
            ->route('admin.baselines.index')
            ->with(
                'success',
                'Compliance baseline updated successfully.'
            );
    }

    /**
     * Delete baseline.
     */
    public function destroy(Baseline $baseline)
    {
        $baseline->delete();

        return redirect()
            ->route('admin.baselines.index')
            ->with(
                'success',
                'Compliance baseline deleted successfully.'
            );
    }
}
