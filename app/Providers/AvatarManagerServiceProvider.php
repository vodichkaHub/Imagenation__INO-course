<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AvatarManagerServiceProvider extends ServiceProvider
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
        $this->app->singleton(AvatarManager::class, 
            function ($app) {
                return new AvatarManager();
            });
    }
}
