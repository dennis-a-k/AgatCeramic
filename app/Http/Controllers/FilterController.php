<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
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
        if ($request->has('category_slug')) {
            session(['current_category_slug' => $request->category_slug]);
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

        // Применяем фильтры к основному запросу
        $filters = ['pattern_id', 'color_id', 'texture_id', 'size_id', 'brand_id'];
        foreach ($filters as $filter) {
            if ($request->has($filter)) {
                $query->where($filter, $request->input($filter));
            }
        }

        // Получаем все товары для характеристик до применения фильтров
        $allProducts = $characteristicsQuery->with([
            'color', 'pattern', 'brand', 'texture', 'size'
        ])->get();

        // Собираем характеристики
        $colors = $request->has('color_id')
            ? Product::where('id', $request->color_id)->get()->pluck('color')->filter()
            : $allProducts->pluck('color')->flatten()->filter()->unique('id')->sortBy('title')->values();

        $brands = $request->has('brand_id')
            ? Product::where('id', $request->brand_id)->get()->pluck('brand')->filter()
            : $allProducts->pluck('brand')->flatten()->filter()->unique('id')->sortBy('title')->values();

        $patterns = $request->has('pattern_id')
            ? Product::where('id', $request->pattern_id)->get()->pluck('pattern')->filter()
            : $allProducts->pluck('pattern')->flatten()->filter()->unique('id')->sortBy('title')->values();

        $textures = $request->has('texture_id')
            ? Product::where('id', $request->texture_id)->get()->pluck('texture')->filter()
            : $allProducts->pluck('texture')->flatten()->filter()->unique('id')->sortBy('title')->values();

        $sizes = $request->has('size_id')
            ? Product::where('id', $request->size_id)->get()->pluck('size')->filter()
            : $allProducts->pluck('size')->flatten()->filter()->unique('id')->sortBy('title')->values();

        // Получаем характеристики только если они не выбраны в фильтрах
        if ($request->has('color_id')) {
            $selectedColor = Product::where('color_id', $request->color_id)
                ->with('color')
                ->first()
                ->color;
            $colors = collect([$selectedColor])->filter();
        }

        if ($request->has('pattern_id')) {
            $selectedPattern = Product::where('pattern_id', $request->pattern_id)
                ->with('pattern')
                ->first()
                ->pattern;
            $patterns = collect([$selectedPattern])->filter();
        }

        if ($request->has('brand_id')) {
            $selectedBrand = Product::where('brand_id', $request->brand_id)
                ->with('brand')
                ->first()
                ->brand;
            $brands = collect([$selectedBrand])->filter();
        }

        if ($request->has('texture_id')) {
            $selecredTexture = Product::where('texture_id', $request->texture_id)
                ->with('texture')
                ->first()
                ->texture;
            $textures = collect([$selecredTexture])->filter();
        }

        if ($request->has('size_id')) {
            $selectedSize = Product::where('size_id', $request->size_id)
                ->with('size')
                ->first()
                ->size;
            $sizes = collect([$selectedSize])->filter();
        }

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
        if ($request->has('brand_slug')) {
            session(['current_brand_slug' => $request->brand_slug]);
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

        // Применяем фильтры к основному запросу
        $filters = ['pattern_id', 'color_id', 'texture_id', 'size_id', 'category_id'];
        foreach ($filters as $filter) {
            if ($request->has($filter)) {
                $query->where($filter, $request->input($filter));
            }
        }

        // Получаем все товары для характеристик до применения фильтров
        $allProducts = $characteristicsQuery->with([
            'color', 'pattern', 'category', 'texture', 'size'
        ])->get();

        // Собираем характеристики
        $colors = $request->has('color_id')
            ? Product::where('id', $request->color_id)->get()->pluck('color')->filter()
            : $allProducts->pluck('color')->flatten()->filter()->unique('id')->sortBy('title')->values();

        $categories = $request->has('category_id')
            ? Product::where('id', $request->category_id)->get()->pluck('category')->filter()
            : $allProducts->pluck('category')->flatten()->filter()->unique('id')->sortBy('title')->values();

        $patterns = $request->has('pattern_id')
            ? Product::where('id', $request->pattern_id)->get()->pluck('pattern')->filter()
            : $allProducts->pluck('pattern')->flatten()->filter()->unique('id')->sortBy('title')->values();

        $textures = $request->has('texture_id')
            ? Product::where('id', $request->texture_id)->get()->pluck('texture')->filter()
            : $allProducts->pluck('texture')->flatten()->filter()->unique('id')->sortBy('title')->values();

        $sizes = $request->has('size_id')
            ? Product::where('id', $request->size_id)->get()->pluck('size')->filter()
            : $allProducts->pluck('size')->flatten()->filter()->unique('id')->sortBy('title')->values();

        // Получаем характеристики только если они не выбраны в фильтрах
        if ($request->has('color_id')) {
            $selectedColor = Product::where('color_id', $request->color_id)
                ->with('color')
                ->first()
                ->color;
            $colors = collect([$selectedColor])->filter();
        }

        if ($request->has('pattern_id')) {
            $selectedPattern = Product::where('pattern_id', $request->pattern_id)
                ->with('pattern')
                ->first()
                ->pattern;
            $patterns = collect([$selectedPattern])->filter();
        }

        if ($request->has('category_id')) {
            $selectedCategory = Product::where('category_id', $request->category_id)
                ->with('category')
                ->first()
                ->category;
            $categories = collect([$selectedCategory])->filter();
        }

        if ($request->has('texture_id')) {
            $selecredTexture = Product::where('texture_id', $request->texture_id)
                ->with('texture')
                ->first()
                ->texture;
            $textures = collect([$selecredTexture])->filter();
        }

        if ($request->has('size_id')) {
            $selectedSize = Product::where('size_id', $request->size_id)
                ->with('size')
                ->first()
                ->size;
            $sizes = collect([$selectedSize])->filter();
        }

        // Применяем сортировку к отфильтрованному запросу
        $query = $this->applySorting($query, $request->input('sort'));

        // Получаем отфильтрованные товары с пагинацией
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
