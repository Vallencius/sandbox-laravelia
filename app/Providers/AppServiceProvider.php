<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use PostHog\PostHog;

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
        PostHog::init(
            'phc_rBGcqoc9RCuB13fHG1Nm0OOIsvIynh6iQajP4niSkpU',
            [
                'host' => 'https://us.i.posthog.com'
            ]
        );
    }
}
