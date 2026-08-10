<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\HospitalSpecialisation;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HospitalSpecialisationController extends Controller
{
    /**
     * Display all hospital specialisations.
     */
    public function index(): View
    {
        $specialisations = HospitalSpecialisation::query()
            ->latest()
            ->paginate(10);

        return view(
            'backend.pages.hospital-specialisations.index',
            compact('specialisations')
        );
    }

    /**
     * Show create form.
     */
    public function create(): View
    {
        return view('backend.pages.hospital-specialisations.create');
    }

    /**
     * Save a new specialisation.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate(
            $this->validationRules()
        );

        HospitalSpecialisation::create($validated);

        flash()->success('Hospital specialisation created successfully.');
        return redirect()->route('admin.hospital-specialisations.index');
    }

    /**
     * Show edit form.
     */
    public function edit(HospitalSpecialisation $hospitalSpecialisation): View
    {
        return view(
            'backend.pages.hospital-specialisations.edit',
            compact('hospitalSpecialisation')
        );
    }

    /**
     * Update specialisation.
     */
    public function update(
        Request $request,
        HospitalSpecialisation $hospitalSpecialisation
    ): RedirectResponse {
        $validated = $request->validate(
            $this->validationRules()
        );

        $hospitalSpecialisation->update($validated);

        flash()->success('Hospital specialisation updated successfully.');
        return redirect()->route('admin.hospital-specialisations.index');
    }

    /**
     * Delete specialisation.
     */
    public function destroy(
        HospitalSpecialisation $hospitalSpecialisation
    ): RedirectResponse {
        $hospitalSpecialisation->delete();

        flash()->success('Hospital specialisation deleted successfully.');
        return redirect()->route('admin.hospital-specialisations.index');
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
