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
    }
}
