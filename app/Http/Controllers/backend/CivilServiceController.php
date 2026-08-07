<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\CivilService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CivilServiceController extends Controller
{
    /**
     * Display all civil services.
     */
    public function index(): View
    {
        $services = CivilService::query()
            ->latest()
            ->paginate(10);

        return view(
            'backend.pages.civil-services.index',
            compact('services')
        );
    }

    /**
     * Show create form.
     */
    public function create(): View
    {
        return view('backend.pages.civil-services.create');
    }

    /**
     * Save a new service.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate(
            $this->validationRules()
        );

        CivilService::create($validated);

        return redirect()
            ->route('admin.civil-services.index')
            ->with('success', 'Civil service created successfully.');
    }

    /**
     * Show edit form.
     */
    public function edit(CivilService $civilService): View
    {
        return view(
            'backend.pages.civil-services.edit',
            compact('civilService')
        );
    }

    /**
     * Update service.
     */
    public function update(
        Request $request,
        CivilService $civilService
    ): RedirectResponse {
        $validated = $request->validate(
            $this->validationRules()
        );

        $civilService->update($validated);

        return redirect()
            ->route('admin.civil-services.index')
            ->with('success', 'Civil service updated successfully.');
    }

    /**
     * Delete service.
     */
    public function destroy(
        CivilService $civilService
    ): RedirectResponse {
        $civilService->delete();

        return redirect()
            ->route('admin.civil-services.index')
            ->with('success', 'Civil service deleted successfully.');
    }

    /**
     * Validation rules.
     */
    private function validationRules(): array
    {
        return [
            'title' => [
                'required',
                'string',
                'max:255',
            ],
            'icon' => [
                'required',
                'string',
                'max:255',
            ],
            'description' => [
                'required',
                'string',
            ],
        ];
    }
}
