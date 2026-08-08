<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\WhyChooseUs;
use App\Models\WhyChooseUsItem;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class WhyChooseUsController extends Controller
{
    /**
     * Display the index view containing the main section settings and the list of items.
     */
    public function index(): View
    {
        $section = WhyChooseUs::first();
        $items = WhyChooseUsItem::all();

        return view('backend.pages.why-choose-us.index', compact('section', 'items'));
    }

    /**
     * Show form to edit the main section settings.
     */
    public function editSection(): View
    {
        $section = WhyChooseUs::first() ?? new WhyChooseUs();
        return view('backend.pages.why-choose-us.edit_section', compact('section'));
    }

    /**
     * Update the main section settings (including image upload).
     */
    public function updateSection(Request $request): RedirectResponse
    {
        $section = WhyChooseUs::first();
        $isUpdate = $section !== null;

        $validated = $request->validate([
            'sub_title' => ['required', 'string', 'max:255'],
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'image' => [
                $isUpdate ? 'nullable' : 'required',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:4096'
            ]
        ]);

        if ($request->hasFile('image')) {
            if ($section && $section->image) {
                Storage::disk('public')->delete($section->image);
            }
            $validated['image'] = $request->file('image')->store('why-choose-us', 'public');
        } else {
            if ($section) {
                unset($validated['image']);
            }
        }

        if ($section) {
            $section->update($validated);
        } else {
            WhyChooseUs::create($validated);
        }

        return redirect()
            ->route('admin.why-choose-us.index')
            ->with('success', 'Why Choose Us section updated successfully.');
    }

    /**
     * Show form to create a new timeline item.
     */
    public function createItem(): View
    {
        return view('backend.pages.why-choose-us.create_item');
    }

    /**
     * Store a new timeline item.
     */
    public function storeItem(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string']
        ]);

        WhyChooseUsItem::create($validated);

        return redirect()
            ->route('admin.why-choose-us.index')
            ->with('success', 'Timeline item added successfully.');
    }

    /**
     * Show form to edit a timeline item.
     */
    public function editItem($id): View
    {
        $item = WhyChooseUsItem::findOrFail($id);
        return view('backend.pages.why-choose-us.edit_item', compact('item'));
    }

    /**
     * Update a timeline item.
     */
    public function updateItem(Request $request, $id): RedirectResponse
    {
        $item = WhyChooseUsItem::findOrFail($id);

        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string']
        ]);

        $item->update($validated);

        return redirect()
            ->route('admin.why-choose-us.index')
            ->with('success', 'Timeline item updated successfully.');
    }

    /**
     * Delete a timeline item.
     */
    public function destroyItem($id): RedirectResponse
    {
        $item = WhyChooseUsItem::findOrFail($id);
        $item->delete();

        return redirect()
            ->route('admin.why-choose-us.index')
            ->with('success', 'Timeline item deleted successfully.');
    }
}
