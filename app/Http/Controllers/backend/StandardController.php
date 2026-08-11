<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Standard;
use App\Models\StandardSection;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class StandardController extends Controller
{
    public function index(): View
    {
        $standards = Standard::orderBy('sort_order')->orderBy('id')->get();

        return view('backend.pages.standards.index', compact('standards'));
    }

    public function create(): View
    {
        $sections = StandardSection::orderBy('title')->get();

        return view('backend.pages.standards.create', compact('sections'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'icon' => 'nullable|string|max:255',
            'abbr' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'applied_to' => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer|min:0',
            'status' => 'nullable|boolean',
        ]);

        $validated['sort_order'] = $validated['sort_order'] ?? 0;
        $validated['status'] = $request->boolean('status');

        Standard::create($validated);

        return redirect()->route('admin.standards.index')->with('success', 'Standard created successfully.');
    }

    public function edit(Standard $standard): View
    {
        $sections = StandardSection::orderBy('title')->get();

        return view('backend.pages.standards.edit', compact('standard', 'sections'));
    }

    public function update(Request $request, Standard $standard): RedirectResponse
    {
        $validated = $request->validate([
            'icon' => 'nullable|string|max:255',
            'abbr' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'applied_to' => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer|min:0',
            'status' => 'nullable|boolean',
        ]);

        $validated['sort_order'] = $validated['sort_order'] ?? 0;
        $validated['status'] = $request->boolean('status');

        $standard->update($validated);

        return redirect()->route('admin.standards.index')->with('success', 'Standard updated successfully.');
    }

    public function destroy(Standard $standard): RedirectResponse
    {
        $standard->delete();

        return redirect()->route('admin.standards.index')->with('success', 'Standard deleted successfully.');
    }
}
