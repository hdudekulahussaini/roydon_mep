<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Metric;
use Illuminate\Http\Request;

class MetricController extends Controller
{
    /**
     * Display all metrics.
     */
    public function index()
    {
        $metrics = Metric::latest()->paginate(10);

        return view(
            'backend.pages.metrics.index',
            compact('metrics')
        );
    }

    /**
     * Show create form.
     */
    public function create()
    {
        return view(
            'backend.pages.metrics.create'
        );
    }

    /**
     * Store a new metric.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'number' => [
                'required',
                'string',
                'max:100',
            ],

            'label' => [
                'required',
                'string',
                'max:255',
            ],

            'status' => [
                'nullable',
                'boolean',
            ],
        ]);

        $validated['status'] = $request->boolean('status');

        Metric::create($validated);

        return redirect()
            ->route('admin.metrics.index')
            ->with(
                'success',
                'Metric created successfully.'
            );
    }

    /**
     * Show edit form.
     */
    public function edit(Metric $metric)
    {
        return view(
            'backend.pages.metrics.edit',
            compact('metric')
        );
    }

    /**
     * Update metric.
     */
    public function update(
        Request $request,
        Metric $metric
    ) {
        $validated = $request->validate([
            'number' => [
                'required',
                'string',
                'max:100',
            ],

            'label' => [
                'required',
                'string',
                'max:255',
            ],

            'status' => [
                'nullable',
                'boolean',
            ],
        ]);

        $validated['status'] = $request->boolean('status');

        $metric->update($validated);

        return redirect()
            ->route('admin.metrics.index')
            ->with(
                'success',
                'Metric updated successfully.'
            );
    }

    /**
     * Delete metric.
     */
    public function destroy(Metric $metric)
    {
        $metric->delete();

        return redirect()
            ->route('admin.metrics.index')
            ->with(
                'success',
                'Metric deleted successfully.'
            );
    }
}