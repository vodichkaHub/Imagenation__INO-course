<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class HomeManagerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(HomeManager::class, 
            function ($app) {
                return new HomeManager();
            });
    }
}
