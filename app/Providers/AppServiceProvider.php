<?php

namespace App\Providers;

use App\Models\AppData;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\View;
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
        $this->app->singleton('appData', function () {
            return AppData::first();
        });

        View::composer('*', function ($view) {
            $view->with('appData', app('appData'));
        });

        $appData = Cache::remember('appData', 3600, function () {
            return AppData::first();
        });
    }
}
