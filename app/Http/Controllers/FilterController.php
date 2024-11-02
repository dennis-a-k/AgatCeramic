<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class FilterController extends Controller
{
    public function filter(Request $request)
    {
        $query = Product::query()->where('is_published', true);
        $title = '';
        // Сохраняем или получаем категорию из сессии
        if ($request->has('category_slug')) {
            session(['current_category_slug' => $request->category_slug]);
        }
        $categorySlug = session('current_category_slug');
        // Применяем фильтр по категории, если она есть
        if ($categorySlug) {
            $category = Category::where('slug', $categorySlug)->firstOrFail();
            $query->where('category_id', $category->id);
            $title = $category->title;
        }
        // Применяем дополнительные фильтры, сохраняя категорию
        $filters = ['pattern_id', 'color_id', 'texture_id', 'size_id', 'brand_id'];
        foreach ($filters as $filter) {
            if ($request->has($filter)) {
                $query->where($filter, $request->input($filter));
            }
        }
        $goods = $query->with(['color', 'pattern', 'brand', 'texture', 'size'])->get();
        // Получаем все возможные значения для фильтров
        $colors = $goods->pluck('color')->flatten()->filter()->unique('id');
        $brands = $goods->pluck('brand')->flatten()->filter()->unique('id');
        $patterns = $goods->pluck('pattern')->flatten()->filter()->unique('id');
        $textures = $goods->pluck('texture')->flatten()->filter()->unique('id');
        $sizes = $goods->pluck('size')->flatten()->filter()->unique('id');
        return view('pages.goods', compact(
            'goods',
            'colors',
            'brands',
            'patterns',
            'textures',
            'sizes',
            'title',
        ));
    }
}
