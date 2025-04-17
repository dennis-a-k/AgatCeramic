<?php

namespace App\View\Composers\ViewComposers;

use App\Models\Call;
use Illuminate\View\View;

class CallComposer
{
    public function compose(View $view)
    {
        $view->with('pendingCallsCount', Call::where('status', 'pending')->count());
    }
}
