<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ProjectProcess;
use Illuminate\Http\Request;

class ProjectProcessController extends Controller
{
    /**
     * Display all project process records.
     */
    public function index()
    {
        $processes = ProjectProcess::orderBy('sort_order')
            ->orderBy('id')
            ->paginate(10);

        return view(
            'backend.pages.project_processes.index',
            compact('processes')
        );
    }


    /**
     * Show create form.
     */
    public function create()
    {
        return view(
            'backend.pages.project_processes.create'
        );
    }


    /**
     * Store new project process.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'icon' => [
                'required',
                'string',
                'max:150',
            ],

            'title' => [
                'required',
                'string',
                'max:255',
            ],

            'description' => [
                'required',
                'string',
            ],

            'small_title' => [
                'nullable',
                'string',
                'max:255',
            ],

            'features' => [
                'nullable',
                'array',
            ],

            'features.*' => [
                'nullable',
                'string',
                'max:500',
            ],

            'sort_order' => [
                'nullable',
                'integer',
                'min:0',
            ],
        ]);

        $validated['features'] = collect(
            $request->input('features', [])
        )
            ->map(fn ($feature) => trim($feature))
            ->filter()
            ->values()
            ->toArray();

        $validated['sort_order'] =
            $validated['sort_order'] ?? 0;

        ProjectProcess::create($validated);

        return redirect()
            ->route('admin.project-processes.index')
            ->with(
                'success',
                'Project process created successfully.'
            );
    }


    /**
     * Show edit form.
     */
    public function edit(ProjectProcess $projectProcess)
    {
        return view(
            'backend.pages.project_processes.edit',
            compact('projectProcess')
        );
    }


    /**
     * Update project process.
     */
    public function update(
        Request $request,
        ProjectProcess $projectProcess
    ) {
        $validated = $request->validate([
            'icon' => [
                'required',
                'string',
                'max:150',
            ],

            'title' => [
                'required',
                'string',
                'max:255',
            ],

            'description' => [
                'required',
                'string',
            ],

            'small_title' => [
                'nullable',
                'string',
                'max:255',
            ],

            'features' => [
                'nullable',
                'array',
            ],

            'features.*' => [
                'nullable',
                'string',
                'max:500',
            ],

            'sort_order' => [
                'nullable',
                'integer',
                'min:0',
            ],
        ]);

        $validated['features'] = collect(
            $request->input('features', [])
        )
            ->map(fn ($feature) => trim($feature))
            ->filter()
            ->values()
            ->toArray();

        $validated['sort_order'] =
            $validated['sort_order'] ?? 0;

        $projectProcess->update($validated);

        return redirect()
            ->route('admin.project-processes.index')
            ->with(
                'success',
                'Project process updated successfully.'
            );
    }


    /**
     * Delete project process.
     */
    public function destroy(ProjectProcess $projectProcess)
    {
        $projectProcess->delete();

        return redirect()
            ->route('admin.project-processes.index')
            ->with(
                'success',
                'Project process deleted successfully.'
            );
    }
}