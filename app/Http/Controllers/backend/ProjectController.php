<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ProjectController extends Controller
{
    /**
     * Display all projects.
     */
    public function index(): View
    {
        $projects = Project::query()
            ->latest()
            ->paginate(10);

        return view(
            'backend.pages.projects.index',
            compact('projects')
        );
    }

    /**
     * Show create form.
     */
    public function create(): View
    {
        return view('backend.pages.projects.create');
    }

    /**
     * Save a new project.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate(
            $this->validationRules()
        );

        if ($request->hasFile('image')) {
            $validated['image'] = $request
                ->file('image')
                ->store('projects', 'public');
        }

        Project::create($validated);

        return redirect()
            ->route('admin.projects.index')
            ->with('success', 'Project created successfully.');
    }

    /**
     * Show edit form.
     */
    public function edit(Project $project): View
    {
        return view(
            'backend.pages.projects.edit',
            compact('project')
        );
    }

    /**
     * Update project.
     */
    public function update(Request $request, Project $project): RedirectResponse
    {
        $validated = $request->validate(
            $this->validationRules(true)
        );

        if ($request->hasFile('image')) {
            // Delete old image if it exists in storage and is not a static asset
            if ($project->image && !str_starts_with($project->image, 'assets/') && Storage::disk('public')->exists($project->image)) {
                Storage::disk('public')->delete($project->image);
            }

            $validated['image'] = $request
                ->file('image')
                ->store('projects', 'public');
        } else {
            // Keep the existing image
            unset($validated['image']);
        }

        $project->update($validated);

        return redirect()
            ->route('admin.projects.index')
            ->with('success', 'Project updated successfully.');
    }

    /**
     * Delete project.
     */
    public function destroy(Project $project): RedirectResponse
    {
        if ($project->image && !str_starts_with($project->image, 'assets/') && Storage::disk('public')->exists($project->image)) {
            Storage::disk('public')->delete($project->image);
        }

        $project->delete();

        return redirect()
            ->route('admin.projects.index')
            ->with('success', 'Project deleted successfully.');
    }

    /**
     * Validation rules.
     */
    private function validationRules(bool $isUpdate = false): array
    {
        return [
            'title' => [
                'required',
                'string',
                'max:255',
            ],
            'image' => [
                $isUpdate ? 'nullable' : 'required',
                'image',
                'mimes:jpeg,png,jpg,webp',
                'max:2048',
            ],
        ];
    }
}
