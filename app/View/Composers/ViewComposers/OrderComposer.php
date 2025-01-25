<?php

namespace App\View\Composers\ViewComposers;

use App\Models\Order;
use Illuminate\View\View;

class OrderComposer
{
    public function compose(View $view)
    {
        $view->with('pendingOrdersCount', Order::where('status', 'pending')->count());
    }
}
