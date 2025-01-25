<?php

namespace App\Providers;

use App\View\Composers\ViewComposers\OrderComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class OrderComposerServiceProvider extends ServiceProvider
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
            'components.admin.sidebar.sidebar'
        ], OrderComposer::class);
    }
}
