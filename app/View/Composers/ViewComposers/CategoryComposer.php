<?php

namespace App\View\Composers\ViewComposers;

use App\Models\Category;
use Illuminate\View\View;

class CategoryComposer
{
    public function compose(View $view)
    {
        $categories = Category::all();
        $view->with([
            'categories' => $categories,
        ]);
    }
}
