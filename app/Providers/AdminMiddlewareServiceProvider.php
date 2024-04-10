<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AdminMiddlewareServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(
            \App\Http\Middleware\AdminMiddleware::class,
            function ($app) {
                return new \App\Http\Middleware\AdminMiddleware();
            }
        );
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
