<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class CategoryController extends Controller
{
    /**
     * Display all categories.
     */
    public function index(): View
    {
        $categories = Category::query()
            ->latest()
            ->paginate(10);

        return view(
            'backend.pages.categories.index',
            compact('categories')
        );
    }

    /**
     * Show create form.
     */
    public function create(): View
    {
        return view('backend.pages.categories.create');
    }

    /**
     * Save a new category.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', 'unique:categories,slug'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        $validated['slug'] = filled($validated['slug'] ?? null)
            ? Str::slug($validated['slug'])
            : Str::slug($validated['name']);

        $validated['is_active'] = $request->has('is_active');

        Category::create($validated);

        flash()->success('Category created successfully.');
        return redirect()->route('admin.categories.index');
    }

    /**
     * Show edit form.
     */
    public function edit(Category $category): View
    {
        return view(
            'backend.pages.categories.edit',
            compact('category')
        );
    }

    /**
     * Update category.
     */
    public function update(Request $request, Category $category): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', 'unique:categories,slug,'.$category->id],
            'is_active' => ['nullable', 'boolean'],
        ]);

        $validated['slug'] = filled($validated['slug'] ?? null)
            ? Str::slug($validated['slug'])
            : Str::slug($validated['name']);

        $validated['is_active'] = $request->has('is_active');

        $category->update($validated);

        flash()->success('Category updated successfully.');
        return redirect()->route('admin.categories.index');
    }

    /**
     * Delete category.
     */
    public function destroy(Category $category): RedirectResponse
    {
        $category->delete();

        flash()->success('Category deleted successfully.');
        return redirect()->route('admin.categories.index');
    }
}
