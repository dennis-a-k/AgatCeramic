<?php

namespace App\View\Composers\ViewComposers;

use App\Models\Brand;
use Illuminate\View\View;

class BrandComposer
{
    public function compose(View $view)
    {
        $brands = Brand::all();
        $view->with([
            'brands' => $brands,
        ]);
    }
}
