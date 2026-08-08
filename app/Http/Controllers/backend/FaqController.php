<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FaqController extends Controller
{
    /**
     * Display all FAQs.
     */
    public function index(): View
    {
        $faqs = Faq::query()
            ->latest()
            ->paginate(10);

        return view(
            'backend.pages.faqs.index',
            compact('faqs')
        );
    }

    /**
     * Show create form.
     */
    public function create(): View
    {
        return view('backend.pages.faqs.create');
    }

    /**
     * Save a new FAQ.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate(
            $this->validationRules()
        );

        Faq::create($validated);

        return redirect()
            ->route('admin.faqs.index')
            ->with('success', 'FAQ created successfully.');
    }

    /**
     * Show edit form.
     */
    public function edit(Faq $faq): View
    {
        return view(
            'backend.pages.faqs.edit',
            compact('faq')
        );
    }

    /**
     * Update FAQ.
     */
    public function update(Request $request, Faq $faq): RedirectResponse
    {
        $validated = $request->validate(
            $this->validationRules()
        );

        $faq->update($validated);

        return redirect()
            ->route('admin.faqs.index')
            ->with('success', 'FAQ updated successfully.');
    }

    /**
     * Delete FAQ.
     */
    public function destroy(Faq $faq): RedirectResponse
    {
        $faq->delete();

        return redirect()
            ->route('admin.faqs.index')
            ->with('success', 'FAQ deleted successfully.');
    }

    /**
     * Validation rules.
     */
    private function validationRules(): array
    {
        return [
            'question' => [
                'required',
                'string',
                'max:255',
            ],
            'answer' => [
                'required',
                'string',
            ],
        ];
    }
}
