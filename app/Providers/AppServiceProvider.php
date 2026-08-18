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
        if($this->app->environment('production')) {
            \URL::forceScheme('https');
        }

        view()->composer(['header', 'footer'], function ($view) {
            $data = $view->getData();
            if (! isset($data['relatedServices'])) {
                $view->with('relatedServices', \App\Models\RelatedService::query()->where('is_visible', true)->orderBy('sort_order')->get());
            }
            if (! isset($data['services'])) {
                $view->with('services', \App\Models\Service::query()->where('is_visible', true)->orderBy('sort_order')->get());
            }
        });
    }
}

