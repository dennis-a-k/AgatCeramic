<?php

namespace App\Providers;

use App\View\Composers\ViewComposers\PatternComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class PatternComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        View::composer([
            'components.header.navbar',
            'components.mobile-menu.navigation'
        ], PatternComposer::class);
    }
}
