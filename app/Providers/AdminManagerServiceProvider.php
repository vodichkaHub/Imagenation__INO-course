<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AdminManagerServiceProvider extends ServiceProvider
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
        $this->app->singleton(AdminManager::class, 
            function ($app) {
                return new AdminManager();
            });
    }
}
