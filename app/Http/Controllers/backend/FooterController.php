<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Footer;
use Illuminate\Http\Request;

class FooterController extends Controller
{
    public function index()
    {
        $footers = Footer::latest()->paginate(10);

        return view('backend.pages.footers.index', compact('footers'));
    }

    public function create()
    {
        return view('backend.pages.footers.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate($this->validationRules());
        Footer::create($validated);

        return redirect()->route('admin.footers.index')->with('success', 'Footer created successfully.');
    }

    public function edit(Footer $footer)
    {
        return view('backend.pages.footers.edit', compact('footer'));
    }

    public function update(Request $request, Footer $footer)
    {
        $validated = $request->validate($this->validationRules());
        $footer->update($validated);

        return redirect()->route('admin.footers.index')->with('success', 'Footer updated successfully.');
    }

    public function destroy(Footer $footer)
    {
        $footer->delete();

        return redirect()->route('admin.footers.index')->with('success', 'Footer deleted successfully.');
    }

    private function validationRules(): array
    {
        return [
            'description' => 'required|string',
            'social_links' => 'nullable|array',
            'social_links.*.icon' => 'required_with:social_links|string|max:255',
            'social_links.*.url' => 'required_with:social_links|url|max:255|distinct',
        ];
    }
}
