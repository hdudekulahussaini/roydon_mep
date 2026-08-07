<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\PremiumStat;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PremiumStatController extends Controller
{
    /**
     * Display all premium stats.
     */
    public function index(): View
    {
        $stats = PremiumStat::query()
            ->latest()
            ->paginate(10);

        return view(
            'backend.pages.premium-stats.index',
            compact('stats')
        );
    }

    /**
     * Show create form.
     */
    public function create(): View
    {
        return view('backend.pages.premium-stats.create');
    }

    /**
     * Save a new stat.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate(
            $this->validationRules()
        );

        $validated['icon'] = 'fa-light fa-circle-check';

        PremiumStat::create($validated);

        return redirect()
            ->route('admin.premium-stats.index')
            ->with('success', 'Premium stat created successfully.');
    }

    /**
     * Show edit form.
     */
    public function edit(PremiumStat $premiumStat): View
    {
        return view(
            'backend.pages.premium-stats.edit',
            compact('premiumStat')
        );
    }

    /**
     * Update stat.
     */
    public function update(
        Request $request,
        PremiumStat $premiumStat
    ): RedirectResponse {
        $validated = $request->validate(
            $this->validationRules()
        );

        $validated['icon'] = 'fa-light fa-circle-check';

        $premiumStat->update($validated);

        return redirect()
            ->route('admin.premium-stats.index')
            ->with('success', 'Premium stat updated successfully.');
    }

    /**
     * Delete stat.
     */
    public function destroy(
        PremiumStat $premiumStat
    ): RedirectResponse {
        $premiumStat->delete();

        return redirect()
            ->route('admin.premium-stats.index')
            ->with('success', 'Premium stat deleted successfully.');
    }

    /**
     * Validation rules.
     */
    private function validationRules(): array
    {
        return [

            'count' => [
                'required',
                'string',
                'max:255',
            ],
            'title' => [
                'required',
                'string',
                'max:255',
            ],
            'description' => [
                'required',
                'string',
                'max:255',
            ],
        ];
    }
}
