<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\SpecialisationSubcategory;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class SpecialisationSubcategoryController extends Controller
{
    /**
     * Display all specialisation subcategories.
     */
    public function index(): View
    {
        $specialisations = SpecialisationSubcategory::with('category')
            ->latest()
            ->paginate(10);

        return view(
            'backend.pages.specialisation-subcategories.index',
            compact('specialisations')
        );
    }

    /**
     * Show create form.
     */
    public function create(): View
    {
        $categories = Category::all();
        return view('backend.pages.specialisation-subcategories.create', compact('categories'));
    }

    /**
     * Save a new specialisation.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate($this->validationRules());

        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['title']);
        } else {
            $validated['slug'] = Str::slug($validated['slug']);
        }

        if ($request->hasFile('banner_image')) {
            $validated['banner_image'] = $request->file('banner_image')->store('specialisation-subcategories/banners', 'public');
        }

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('specialisation-subcategories/images', 'public');
        }
        
        $validated['status'] = $request->has('status');

        SpecialisationSubcategory::create($validated);

        return redirect()
            ->route('admin.specialisation-subcategories.index')
            ->with('success', 'Specialisation subcategory created successfully.');
    }

    /**
     * Show edit form.
     */
    public function edit(SpecialisationSubcategory $specialisationSubcategory): View
    {
        $categories = Category::all();
        return view(
            'backend.pages.specialisation-subcategories.edit',
            compact('specialisationSubcategory', 'categories')
        );
    }

    /**
     * Update specialisation.
     */
    public function update(
        Request $request,
        SpecialisationSubcategory $specialisationSubcategory
    ): RedirectResponse {
        $validated = $request->validate($this->validationRules($specialisationSubcategory->id));

        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['title']);
        } else {
            $validated['slug'] = Str::slug($validated['slug']);
        }

        if ($request->hasFile('banner_image')) {
            if ($specialisationSubcategory->banner_image) {
                Storage::disk('public')->delete($specialisationSubcategory->banner_image);
            }
            $validated['banner_image'] = $request->file('banner_image')->store('specialisation-subcategories/banners', 'public');
        }

        if ($request->hasFile('image')) {
            if ($specialisationSubcategory->image) {
                Storage::disk('public')->delete($specialisationSubcategory->image);
            }
            $validated['image'] = $request->file('image')->store('specialisation-subcategories/images', 'public');
        }
        
        $validated['status'] = $request->has('status');

        $specialisationSubcategory->update($validated);

        return redirect()
            ->route('admin.specialisation-subcategories.index')
            ->with('success', 'Specialisation subcategory updated successfully.');
    }

    /**
     * Delete specialisation.
     */
    public function destroy(
        SpecialisationSubcategory $specialisationSubcategory
    ): RedirectResponse {
        if ($specialisationSubcategory->banner_image) {
            Storage::disk('public')->delete($specialisationSubcategory->banner_image);
        }
        if ($specialisationSubcategory->image) {
            Storage::disk('public')->delete($specialisationSubcategory->image);
        }
        
        $specialisationSubcategory->delete();

        return redirect()
            ->route('admin.specialisation-subcategories.index')
            ->with('success', 'Specialisation subcategory deleted successfully.');
    }

    /**
     * Validation rules.
     */
    private function validationRules(?int $id = null): array
    {
        return [
            'category_id' => ['nullable', 'exists:categories,id'],
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', 'unique:specialisation_subcategories,slug,' . $id],
            'banner_tags' => ['nullable', 'array'],
            'banner_tags.*' => ['string'],
            'banner_image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,webp', 'max:2048'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,webp', 'max:2048'],
            'description' => ['required', 'string'],
            'cta_title' => ['nullable', 'string', 'max:255'],
            'cta_description' => ['nullable', 'string'],
            'cta_button_url' => ['nullable', 'string', 'max:255'],
            'features_heading' => ['nullable', 'array'],
            'features_heading.*' => ['nullable', 'string'],
            'features_description' => ['nullable', 'array'],
            'features_description.*' => ['nullable', 'string'],
            'tags' => ['nullable', 'array'],
            'tags.*' => ['string'],
            'seo_text' => ['nullable', 'string'],
        ];
    }
}
