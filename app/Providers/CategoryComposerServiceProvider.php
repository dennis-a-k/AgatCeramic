<?php

namespace App\Providers;

use App\View\Composers\ViewComposers\CategoryComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class CategoryComposerServiceProvider extends ServiceProvider
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
            'components.footer.footer',
            'components.mobile-menu.navigation',
            'components.banner.banner',
            'pages.cart',
            'pages.order-success',
        ], CategoryComposer::class);
    }
}
