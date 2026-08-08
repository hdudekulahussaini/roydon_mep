<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\OfficeLocation;
use Illuminate\Http\Request;

class OfficeLocationController extends Controller
{
    /**
     * Display office locations.
     */
    public function index()
    {
        $officeLocations = OfficeLocation::orderBy('sort_order')
            ->latest('id')
            ->paginate(10);

        return view(
            'backend.pages.office_locations.index',
            compact('officeLocations')
        );
    }

    /**
     * Show create form.
     */
    public function create()
    {
        return view(
            'backend.pages.office_locations.create'
        );
    }

    /**
     * Store office location.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'flag' => [
                'required',
                'string',
                'max:20',
            ],

            'city' => [
                'required',
                'string',
                'max:100',
            ],

            'type' => [
                'required',
                'string',
                'max:255',
            ],

            'description' => [
                'required',
                'string',
            ],

            'address' => [
                'nullable',
                'string',
            ],

            'phone' => [
                'nullable',
                'string',
                'max:100',
            ],

            'email' => [
                'nullable',
                'email',
                'max:255',
            ],

            'seo' => [
                'nullable',
                'string',
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

        OfficeLocation::create($validated);

        return redirect()
            ->route('admin.office-locations.index')
            ->with(
                'success',
                'Office location created successfully.'
            );
    }

    /**
     * Show edit form.
     */
    public function edit(OfficeLocation $officeLocation)
    {
        return view(
            'backend.pages.office_locations.edit',
            compact('officeLocation')
        );
    }

    /**
     * Update office location.
     */
    public function update(
        Request $request,
        OfficeLocation $officeLocation
    ) {
        $validated = $request->validate([
            'flag' => [
                'required',
                'string',
                'max:20',
            ],

            'city' => [
                'required',
                'string',
                'max:100',
            ],

            'type' => [
                'required',
                'string',
                'max:255',
            ],

            'description' => [
                'required',
                'string',
            ],

            'address' => [
                'nullable',
                'string',
            ],

            'phone' => [
                'nullable',
                'string',
                'max:100',
            ],

            'email' => [
                'nullable',
                'email',
                'max:255',
            ],

            'seo' => [
                'nullable',
                'string',
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

        $officeLocation->update($validated);

        return redirect()
            ->route('admin.office-locations.index')
            ->with(
                'success',
                'Office location updated successfully.'
            );
    }

    /**
     * Delete office location.
     */
    public function destroy(OfficeLocation $officeLocation)
    {
        $officeLocation->delete();

        return redirect()
            ->route('admin.office-locations.index')
            ->with(
                'success',
                'Office location deleted successfully.'
            );
    }
}