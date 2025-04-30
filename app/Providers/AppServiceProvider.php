<?php

namespace App\Providers;

use App\Models\AppData;
use App\Services\FilterService;
use App\Services\SessionService;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(FilterService::class, fn () => new FilterService());
        $this->app->singleton(SessionService::class, fn () => new SessionService());
        $this->app->singleton('appData', fn () => Cache::remember('appData', 3600,
            fn () => AppData::first()
        ));
    }

    public function boot(): void
    {
        View::composer('*', function ($view) {
            $view->with('appData', app('appData'));
        });
    }
}
