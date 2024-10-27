<?php

namespace App\View\Composers\ViewComposers;

use App\Models\Pattern;
use Illuminate\View\View;

class PatternComposer
{
    public function compose(View $view)
    {
        $patterns = Pattern::orderBy('id', 'ASC')->get();
        $view->with('patterns', $patterns);
    }
}
