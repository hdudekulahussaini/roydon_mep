<?php

namespace App\Providers;

use App\Models\CivilService;
use App\Models\Enquiry;
use App\Models\OfficeLocation;
use App\Models\Project;
use App\Models\ServiceSubcategory;
use App\Models\SpecialisationSubcategory;
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
        view()->composer(['frontend.partials.header', 'frontend.pages.specialisation'], function ($view) {
            $view->with('headerSpecialisations', SpecialisationSubcategory::where('status', true)->get());
        });

        view()->composer(['frontend.partials.header', 'frontend.partials.footer', 'frontend.pages.service'], function ($view) {
            $view->with('headerServices', ServiceSubcategory::where('status', true)->get());
        });

        view()->composer('frontend.partials.footer', function ($view) {
            $view->with('footerData', \App\Models\Footer::first());
            $view->with('contactSetting', \App\Models\ContactSetting::first());
        });

        // Share admin dashboard stats with backend layouts
        view()->composer('layouts.backend.*', function ($view) {
            $view->with('stats', [
                'projects' => Project::count(),
                'services' => CivilService::count(),
                'enquiries' => Enquiry::count(),
                'new_enquiries' => Enquiry::where('created_at', '>=', now()->subDays(7))->count(),
                'completed_projects' => Project::where('result', 'completed')->count(),
                'locations' => OfficeLocation::count(),
            ]);
        });
    }
}
