<?php

namespace App\View\Composers\ViewComposers;

use App\Models\Category;
use Illuminate\View\View;

class CategoryComposer
{
    public function compose(View $view)
    {
        $categories = Category::all();
        $santexnika = Category::where('title', config('categories.santexnika'))->first() ?? '';
        $plumbing = Category::with('children.children')->where('id', $santexnika->id)->firstOrFail();
        $view->with([
            'categories' => $categories,
            'plumbing' => $plumbing,
        ]);
    }
}
