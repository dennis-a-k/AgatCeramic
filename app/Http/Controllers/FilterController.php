<?php

namespace App\Http\Controllers;

use App\Models\Brand;
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
        $colors = $goods->pluck('color')->flatten()->filter()->unique('id')->sortBy(function ($color) {
            return $color->title;
        });
        $brands = $goods->pluck('brand')->flatten()->filter()->unique('id')->sortBy(function ($brand) {
            return $brand->title;
        });
        $patterns = $goods->pluck('pattern')->flatten()->filter()->unique('id')->sortBy(function ($pattern) {
            return $pattern->title;
        });
        $textures = $goods->pluck('texture')->flatten()->filter()->unique('id')->sortBy(function ($texture) {
            return $texture->title;
        });
        $sizes = $goods->pluck('size')->flatten()->filter()->unique('id')->sortBy(function ($size) {
            return $size->title;
        });
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

    public function filters(Request $request)
    {
        $query = Product::query()->where('is_published', true);
        $title = '';
        // Сохраняем или получаем категорию из сессии
        if ($request->has('brand_slug')) {
            session(['current_brand_slug' => $request->brand_slug]);
        }
        $brandSlug = session('current_brand_slug');
        // Применяем фильтр по категории, если она есть
        if ($brandSlug) {
            $brand = Brand::where('slug', $brandSlug)->firstOrFail();
            $query->where('brand_id', $brand->id);
            $title = $brand->title;
        }
        // Применяем дополнительные фильтры, сохраняя категорию
        $filters = ['pattern_id', 'color_id', 'texture_id', 'size_id', 'category_id'];
        foreach ($filters as $filter) {
            if ($request->has($filter)) {
                $query->where($filter, $request->input($filter));
            }
        }
        $goods = $query->with(['color', 'pattern', 'category', 'texture', 'size'])->get();
        // Получаем все возможные значения для фильтров
        $colors = $goods->pluck('color')->flatten()->filter()->unique('id')->sortBy(function ($color) {
            return $color->title;
        });
        $categories = $goods->pluck('category')->flatten()->filter()->unique('id')->sortBy(function ($category) {
            return $category->title;
        });
        $patterns = $goods->pluck('pattern')->flatten()->filter()->unique('id')->sortBy(function ($pattern) {
            return $pattern->title;
        });
        $textures = $goods->pluck('texture')->flatten()->filter()->unique('id')->sortBy(function ($texture) {
            return $texture->title;
        });
        $sizes = $goods->pluck('size')->flatten()->filter()->unique('id')->sortBy(function ($size) {
            return $size->title;
        });
        return view('pages.goods-brand', compact(
            'goods',
            'colors',
            'categories',
            'patterns',
            'textures',
            'sizes',
            'title',
            'brand',
        ));
    }

    // public function filter(Request $request)
    // {
    //     return $this->applyFilters($request, 'category');
    // }

    // public function filters(Request $request)
    // {
    //     return $this->applyFilters($request, 'brand');
    // }

    // private function applyFilters(Request $request, string $type)
    // {
    //     $query = Product::query()->where('is_published', true);
    //     $brand = '';
    //     $title = '';

    //     // Сохраняем или получаем категорию/бренд из сессии
    //     $slugKey = $type === 'category' ? 'category_slug' : 'brand_slug';
    //     session()->put("current_{$type}_slug", $request->input($slugKey));

    //     $slug = session("current_{$type}_slug");
    //     if ($slug) {
    //         $model = $type === 'category' ? Category::class : Brand::class;
    //         $item = $model::where('slug', $slug)->firstOrFail();
    //         $brand = $item;
    //         $query->where("{$type}_id", $item->id);
    //         $title = $item->title;
    //     }

    //     // Применяем дополнительные фильтры
    //     $filters = ['pattern_id', 'color_id', 'texture_id', 'size_id'];
    //     if ($type === 'category') {
    //         $filters[] = 'brand_id';
    //     } else {
    //         $filters[] = 'category_id';
    //     }

    //     foreach ($filters as $filter) {
    //         if ($request->has($filter)) {
    //             $query->where($filter, $request->input($filter));
    //         }
    //     }

    //     $goods = $query->with(['color', 'pattern', 'brand', 'texture', 'size', 'category'])->get();

    //     // Получаем все возможные значения для фильтров
    //     $colors = $this->getUniqueSorted($goods, 'color');
    //     $patterns = $this->getUniqueSorted($goods, 'pattern');
    //     $textures = $this->getUniqueSorted($goods, 'texture');
    //     $sizes = $this->getUniqueSorted($goods, 'size');
    //     $categories = $this->getUniqueSorted($goods, 'category');

    //     // Если тип фильтра - категория, получаем категории, иначе - бренды
    //     $additionalData = $type === 'category' ? ['brands' => $this->getUniqueSorted($goods, 'brand')] : ['categories' => $this->getUniqueSorted($goods, 'category')];

    //     return view($type === 'category' ? 'pages.goods' : 'pages.goods-brand', array_merge(
    //         compact('goods', 'colors', 'patterns', 'textures', 'sizes',  'categories', 'title', 'brand'),
    //         $additionalData
    //     ));
    // }

    // private function getUniqueSorted($goods, $relation)
    // {
    //     return $goods->pluck($relation)->flatten()->filter()->unique('id')->sortBy(function ($item) {
    //         return $item->title;
    //     });
    // }
}
