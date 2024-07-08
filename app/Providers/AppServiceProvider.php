<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Auth\Middleware\Authenticate;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
    }

    public function boot(): void
    {
        Authenticate::redirectUsing(function ($request) {
            if ($request->routeIs('dashboard.*')) return route('dashboard.login');

            return route('login');
        });
    }
}
