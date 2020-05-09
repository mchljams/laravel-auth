<?php

namespace Mchljams\LaravelAuth;

use Illuminate\Support\ServiceProvider;

class LaravelAuthServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // Load the package API Routes
        $this->loadRoutesFrom(__DIR__.'/../routes/api.php');
        // Load the package migrations
        $this->loadMigrationsFrom(__DIR__.'/Database/Migrations');
    }
}
