<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\CompanyValue;
use Illuminate\Http\Request;

class CompanyValueController extends Controller
{
    public function index()
    {
        $companyValues = CompanyValue::latest()->paginate(10);

        return view(
            'backend.pages.company_values.index',
            compact('companyValues')
        );
    }

    public function create()
    {
        return view(
            'backend.pages.company_values.create'
        );
    }

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

            'status' => [
                'nullable',
                'boolean',
            ],
        ]);

        $validated['status'] = $request->boolean('status');

        CompanyValue::create($validated);

        return redirect()
            ->route('admin.company-values.index')
            ->with(
                'success',
                'Company value created successfully.'
            );
    }

    public function edit(CompanyValue $companyValue)
    {
        return view(
            'backend.pages.company_values.edit',
            compact('companyValue')
        );
    }

    public function update(
        Request $request,
        CompanyValue $companyValue
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

            'status' => [
                'nullable',
                'boolean',
            ],
        ]);

        $validated['status'] = $request->boolean('status');

        $companyValue->update($validated);

        return redirect()
            ->route('admin.company-values.index')
            ->with(
                'success',
                'Company value updated successfully.'
            );
    }

    public function destroy(CompanyValue $companyValue)
    {
        $companyValue->delete();

        return redirect()
            ->route('admin.company-values.index')
            ->with(
                'success',
                'Company value deleted successfully.'
            );
    }
}