<?php

namespace App\View\Composers\ViewComposers;

use App\Models\Category;
use App\Models\Pattern;
use Illuminate\View\View;

class PatternComposer
{
    public function compose(View $view)
    {
        $categories = Category::all();
        $patterns = Pattern::orderBy('id', 'ASC')->get();
        $view->with([
            'patterns' => $patterns,
            'categories' => $categories,
        ]);
    }
}
