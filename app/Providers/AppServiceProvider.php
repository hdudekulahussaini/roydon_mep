<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        view()->composer('frontend.partials.header', function ($view) {
            $view->with('headerSpecialisations', \App\Models\SpecialisationSubcategory::where('status', true)->get());
        });

        view()->composer(['frontend.partials.header', 'frontend.pages.service'], function ($view) {
            $view->with('headerServices', \App\Models\ServiceSubcategory::where('status', true)->get());
        });

        // Share admin dashboard stats with backend layouts
        view()->composer('layouts.backend.*', function ($view) {
            $view->with('stats', [
                'projects' => \App\Models\Project::count(),
                'services' => \App\Models\CivilService::count(),
                'enquiries' => \App\Models\Enquiry::count(),
                'new_enquiries' => \App\Models\Enquiry::where('created_at', '>=', now()->subDays(7))->count(),
                'completed_projects' => \App\Models\Project::where('result', 'completed')->count(),
                'locations' => \App\Models\OfficeLocation::count(),
            ]);
        });
    }
}
