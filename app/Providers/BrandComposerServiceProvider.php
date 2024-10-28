<?php

namespace App\Providers;

use App\View\Composers\ViewComposers\BrandComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class BrandComposerServiceProvider extends ServiceProvider
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
            'components.header.nav-alphabet',
        ], BrandComposer::class);
    }
}
