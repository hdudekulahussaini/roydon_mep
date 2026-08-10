<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\ServiceSubcategory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;

class ServiceSubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $subcategories = ServiceSubcategory::with('category')->latest()->paginate(10);

        return view('backend.pages.service-subcategories.index', compact('subcategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $categories = Category::where('is_active', true)->get();

        return view('backend.pages.service-subcategories.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate($this->validationRules());

        $validated['slug'] = filled($validated['slug'] ?? null)
            ? Str::slug($validated['slug'])
            : Str::slug($validated['title']);

        $validated['status'] = $request->has('status');

        if ($request->hasFile('images')) {
            $images = [];
            foreach ($request->file('images') as $image) {
                $images[] = $image->store('service-subcategories', 'public');
            }
            $validated['images'] = $images;
        }
        if ($request->hasFile('banner_image')) {
            $validated['banner_image'] = $request->file('banner_image')->store('service-subcategories', 'public');
        }

        // Handle JSON arrays
        $validated['offerings_title'] = $this->cleanArray($request->input('offerings_title'));
        $validated['offerings_description'] = $this->cleanArray($request->input('offerings_description'));
        $validated['offerings_icon'] = $this->cleanArray($request->input('offerings_icon'));
        $validated['offerings_sort_order'] = $this->cleanArray($request->input('offerings_sort_order'));

        ServiceSubcategory::create($validated);

        flash()->success('Service Subcategory created successfully.');
        return redirect()->route('admin.service-subcategories.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ServiceSubcategory $serviceSubcategory): View
    {
        $categories = Category::where('is_active', true)->get();

        return view('backend.pages.service-subcategories.edit', compact('serviceSubcategory', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ServiceSubcategory $serviceSubcategory): RedirectResponse
    {
        $validated = $request->validate($this->validationRules($serviceSubcategory->id));

        $validated['slug'] = filled($validated['slug'] ?? null)
            ? Str::slug($validated['slug'])
            : Str::slug($validated['title']);

        $validated['status'] = $request->has('status');

        if ($request->hasFile('images')) {
            // Delete old images
            if (is_array($serviceSubcategory->images)) {
                foreach ($serviceSubcategory->images as $oldImage) {
                    Storage::disk('public')->delete($oldImage);
                }
            }

            $images = [];
            foreach ($request->file('images') as $image) {
                $images[] = $image->store('service-subcategories', 'public');
            }
            $validated['images'] = $images;
        } else {
            // Keep old images if not updating
            unset($validated['images']);
        }

        if ($request->hasFile('banner_image')) {
            if ($serviceSubcategory->banner_image) {
                Storage::disk('public')->delete($serviceSubcategory->banner_image);
            }
            $validated['banner_image'] = $request->file('banner_image')->store('service-subcategories', 'public');
        } else {
            unset($validated['banner_image']);
        }

        // Handle JSON arrays
        $validated['offerings_title'] = $this->cleanArray($request->input('offerings_title'));
        $validated['offerings_description'] = $this->cleanArray($request->input('offerings_description'));
        $validated['offerings_icon'] = $this->cleanArray($request->input('offerings_icon'));
        $validated['offerings_sort_order'] = $this->cleanArray($request->input('offerings_sort_order'));

        $serviceSubcategory->update($validated);

        flash()->success('Service Subcategory updated successfully.');
        return redirect()->route('admin.service-subcategories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ServiceSubcategory $serviceSubcategory): RedirectResponse
    {
        if (is_array($serviceSubcategory->images)) {
            foreach ($serviceSubcategory->images as $oldImage) {
                Storage::disk('public')->delete($oldImage);
            }
        }

        if ($serviceSubcategory->banner_image) {
            Storage::disk('public')->delete($serviceSubcategory->banner_image);
        }

        $serviceSubcategory->delete();

        flash()->success('Service Subcategory deleted successfully.');
        return redirect()->route('admin.service-subcategories.index');
    }

    /**
     * Clean array input to ensure no null values are saved as empty elements
     */
    private function cleanArray(?array $array): array
    {
        if (! $array) {
            return [];
        }

        return array_values($array); // Re-index array
    }

    /**
     * Validation rules
     */
    private function validationRules(?int $id = null): array
    {
        $slugRule = 'unique:service_subcategories,slug';
        if ($id) {
            $slugRule .= ','.$id;
        }

        return [
            'category_id' => ['required', 'exists:categories,id'],
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', $slugRule],
            'heading' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string'],

            'images' => ['nullable', 'array'],
            'images.*' => ['image', 'mimes:jpg,jpeg,png,webp', 'max:4096'],

            'banner_image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:4096'],

            'cta_phone' => ['nullable', 'string', 'max:50'],

            'offerings_title' => ['nullable', 'array'],
            'offerings_title.*' => ['nullable', 'string', 'max:255'],
            'offerings_description' => ['nullable', 'array'],
            'offerings_description.*' => ['nullable', 'string'],
            'offerings_icon' => ['nullable', 'array'],
            'offerings_icon.*' => ['nullable', 'string', 'max:100'],
            'offerings_sort_order' => ['nullable', 'array'],
            'offerings_sort_order.*' => ['nullable', 'integer'],

            'compliance_title' => ['nullable', 'string', 'max:255'],
            'compliance_description' => ['nullable', 'string'],
            'status' => ['nullable', 'boolean'],
        ];
    }
}
