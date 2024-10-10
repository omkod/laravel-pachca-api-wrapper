<?php

namespace Omcod\LaravelPachcaApiWrapper\Providers;

use Illuminate\Support\ServiceProvider;

class PachcaServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->publishes([__DIR__ . '/../config/pachca.php' => config_path('pachca.php')]);
    }
}
