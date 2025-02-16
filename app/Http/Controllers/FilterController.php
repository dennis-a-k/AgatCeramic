<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Color;
use App\Models\Pattern;
use App\Models\Texture;
use App\Models\Size;
use App\Traits\SortableProducts;
use Illuminate\Http\Request;

class FilterController extends Controller
{
    use SortableProducts;

    public function filter(Request $request)
    {
        $query = Product::query()->where('is_published', true);
        $title = '';

        // Сохраняем или получаем категорию из сессии
        if ($request->has('category')) {
            session(['current_category_slug' => $request->category]);
        }
        $categorySlug = session('current_category_slug');

        // Базовый запрос для категории
        if ($categorySlug) {
            $category = Category::where('slug', $categorySlug)->firstOrFail();
            $query->where('category_id', $category->id);
            $title = $category->title;
        }

        // Клонируем запрос для получения характеристик
        $characteristicsQuery = clone $query;

        // Применяем фильтры к основному запросу используя slugs
        if ($request->has('pattern')) {
            $pattern = Pattern::where('slug', $request->pattern)->first();
            if ($pattern) {
                $query->where('pattern_id', $pattern->id);
            }
        }

        if ($request->has('color')) {
            $color = Color::where('slug', $request->color)->first();
            if ($color) {
                $query->where('color_id', $color->id);
            }
        }

        if ($request->has('texture')) {
            $texture = Texture::where('slug', $request->texture)->first();
            if ($texture) {
                $query->where('texture_id', $texture->id);
            }
        }

        if ($request->has('size')) {
            $size = Size::where('title', $request->size)->first();
            if ($size) {
                $query->where('size_id', $size->id);
            }
        }

        if ($request->has('brand')) {
            $brand = Brand::where('slug', $request->brand)->first();
            if ($brand) {
                $query->where('brand_id', $brand->id);
            }
        }

        // Получаем все товары для характеристик до применения фильтров
        $allProducts = $characteristicsQuery->with([
            'color',
            'pattern',
            'brand',
            'texture',
            'size'
        ])->get();

        // Собираем характеристики
        $colors = $request->has('color')
            ? collect([Color::where('slug', $request->color)->first()])->filter()
            : $allProducts->pluck('color')->flatten()->filter()->unique('id')->sortBy('title')->values();

        $brands = $request->has('brand')
            ? collect([Brand::where('slug', $request->brand)->first()])->filter()
            : $allProducts->pluck('brand')->flatten()->filter()->unique('id')->sortBy('title')->values();

        $patterns = $request->has('pattern')
            ? collect([Pattern::where('slug', $request->pattern)->first()])->filter()
            : $allProducts->pluck('pattern')->flatten()->filter()->unique('id')->sortBy('title')->values();

        $textures = $request->has('texture')
            ? collect([Texture::where('slug', $request->texture)->first()])->filter()
            : $allProducts->pluck('texture')->flatten()->filter()->unique('id')->sortBy('title')->values();

        $sizes = $request->has('size')
            ? collect([Size::where('title', $request->size)->first()])->filter()
            : $allProducts->pluck('size')->flatten()->filter()->unique('id')->sortBy('title')->values();

        // Применяем сортировку к отфильтрованному запросу
        $query = $this->applySorting($query, $request->input('sort'));

        // Получаем отфильтрованные товары с пагинацией
        $goods = $query->with(['color', 'pattern', 'brand', 'texture', 'size'])
            ->paginate(40);

        return view('pages.goods', compact(
            'goods',
            'colors',
            'brands',
            'patterns',
            'textures',
            'sizes',
            'title',
            'category'
        ));
    }

    public function filters(Request $request)
    {
        $query = Product::query()->where('is_published', true);
        $title = '';

        // Сохраняем или получаем бренд из сессии
        if ($request->has('brand')) {
            session(['current_brand_slug' => $request->brand]);
        }
        $brandSlug = session('current_brand_slug');

        // Базовый запрос для бренда
        if ($brandSlug) {
            $brand = Brand::where('slug', $brandSlug)->firstOrFail();
            $query->where('brand_id', $brand->id);
            $title = $brand->title;
        }

        // Клонируем запрос для получения характеристик
        $characteristicsQuery = clone $query;

        // Применяем фильтры к основному запросу используя slugs
        if ($request->has('pattern')) {
            $pattern = Pattern::where('slug', $request->pattern)->first();
            if ($pattern) {
                $query->where('pattern_id', $pattern->id);
            }
        }

        if ($request->has('color')) {
            $color = Color::where('slug', $request->color)->first();
            if ($color) {
                $query->where('color_id', $color->id);
            }
        }

        if ($request->has('texture')) {
            $texture = Texture::where('slug', $request->texture)->first();
            if ($texture) {
                $query->where('texture_id', $texture->id);
            }
        }

        if ($request->has('size')) {
            $size = Size::where('title', $request->size)->first();
            if ($size) {
                $query->where('size_id', $size->id);
            }
        }

        if ($request->has('category')) {
            $category = Category::where('slug', $request->category)->first();
            if ($category) {
                $query->where('category_id', $category->id);
            }
        }

        // Получаем все товары для характеристик
        $allProducts = $characteristicsQuery->with([
            'color',
            'pattern',
            'category',
            'texture',
            'size'
        ])->get();

        // Собираем характеристики
        $colors = $request->has('color')
            ? collect([Color::where('slug', $request->color)->first()])->filter()
            : $allProducts->pluck('color')->flatten()->filter()->unique('id')->sortBy('title')->values();

        $categories = $request->has('category')
            ? collect([Category::where('slug', $request->category)->first()])->filter()
            : $allProducts->pluck('category')->flatten()->filter()->unique('id')->sortBy('title')->values();

        $patterns = $request->has('pattern')
            ? collect([Pattern::where('slug', $request->pattern)->first()])->filter()
            : $allProducts->pluck('pattern')->flatten()->filter()->unique('id')->sortBy('title')->values();

        $textures = $request->has('texture')
            ? collect([Texture::where('slug', $request->texture)->first()])->filter()
            : $allProducts->pluck('texture')->flatten()->filter()->unique('id')->sortBy('title')->values();

        $sizes = $request->has('size')
            ? collect([Size::where('title', $request->size)->first()])->filter()
            : $allProducts->pluck('size')->flatten()->filter()->unique('id')->sortBy('title')->values();

        // Применяем сортировку
        $query = $this->applySorting($query, $request->input('sort'));

        // Получаем товары с пагинацией
        $goods = $query->with(['color', 'pattern', 'category', 'texture', 'size'])
            ->paginate(40);

        return view('pages.goods-brand', compact(
            'goods',
            'colors',
            'categories',
            'patterns',
            'textures',
            'sizes',
            'title',
            'brand'
        ));
    }
}
