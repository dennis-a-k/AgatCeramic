<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Pattern;
use App\Models\Product;
use App\Models\Size;
use App\Models\Texture;
use App\Traits\SortableProducts;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    use SortableProducts;

    public function saleFilter(Request $request)
    {
        // Основной запрос для товаров
        $query = Product::query()
            ->where('is_published', true)
            ->whereNotNull('sale')
            ->where('sale', '>', 0)
            ->with(['color', 'pattern', 'brand', 'texture', 'size', 'category']);

        // Применяем фильтры из запроса
        $this->applyFilters($query, $request);

        // Клонируем запрос для получения характеристик
        $filteredProductsQuery = clone $query;
        $filteredProducts = $filteredProductsQuery->get();

        // Получаем доступные значения для фильтров на основе уже отфильтрованных товаров
        $filters = $this->getAvailableFilters($filteredProducts, $request);

        // Применяем сортировку
        $query = $this->applySorting($query, $request->input('sort'));

        // Пагинация
        $goods = $query->paginate(40);

        return view('pages.goods-sale', array_merge([
            'goods' => $goods,
            'title' => 'Распродажа'
        ], $filters));
    }

    private function applyFilters($query, Request $request)
    {
        // Фильтр по паттерну
        if ($request->has('pattern')) {
            $pattern = Pattern::where('slug', $request->pattern)->first();
            if ($pattern) {
                $query->where('pattern_id', $pattern->id);
            }
        }

        // Фильтр по цвету
        if ($request->has('color')) {
            $color = Color::where('slug', $request->color)->first();
            if ($color) {
                $query->where('color_id', $color->id);
            }
        }

        // Фильтр по категории
        if ($request->has('category')) {
            $category = Category::where('slug', $request->category)->first();
            if ($category) {
                $query->where('category_id', $category->id);
            }
        }

        // Фильтр по текстуре
        if ($request->has('texture')) {
            $texture = Texture::where('slug', $request->texture)->first();
            if ($texture) {
                $query->where('texture_id', $texture->id);
            }
        }

        // Фильтр по размеру
        if ($request->has('size')) {
            $size = Size::where('title', $request->size)->first();
            if ($size) {
                $query->where('size_id', $size->id);
            }
        }

        // Фильтр по бренду
        if ($request->has('brand')) {
            $brand = Brand::where('slug', $request->brand)->first();
            if ($brand) {
                $query->where('brand_id', $brand->id);
            }
        }

        // Фильтр по весу
        if ($request->has('weight')) {
            $weight = $request->weight;
            $query->whereJsonContains('attributes->weight_kg', $weight);
        }

        if ($request->has('glue')) {
            $glue = $request->glue;
            $query->whereJsonContains('attributes->glue', $glue);
        }

        if ($request->has('mixture_types')) {
            $mixture_types = $request->mixture_types;
            $query->whereJsonContains('attributes->mixture_types', $mixture_types);
        }

        if ($request->has('seams')) {
            $seams = $request->seams;
            $query->whereJsonContains('attributes->seams', $seams);
        }
    }

    private function getAvailableFilters($products, Request $request)
    {
        // Получаем доступные цвета (только из отфильтрованных товаров)
        $colors = $products->pluck('color')
            ->unique('id')
            ->filter()
            ->sortBy('title')
            ->values();

        // Получаем доступные бренды
        $brands = $products->pluck('brand')
            ->unique('id')
            ->filter()
            ->sortBy('title')
            ->values();

        // Получаем доступные паттерны
        $patterns = $products->pluck('pattern')
            ->unique('id')
            ->filter()
            ->sortBy('title')
            ->values();

        // Получаем доступные текстуры
        $textures = $products->pluck('texture')
            ->unique('id')
            ->filter()
            ->sortBy('title')
            ->values();

        // Получаем доступные размеры
        $sizes = $products->pluck('size')
            ->unique('id')
            ->filter()
            ->sortBy('title')
            ->values();

        // Получаем доступные категории
        $categories = $products->pluck('category')
            ->unique('id')
            ->filter()
            ->sortBy('title')
            ->values();

        // Получаем доступные веса
        $weights = $products->filter(function ($product) {
            return isset($product->attributes['weight_kg']);
        })->pluck('attributes.weight_kg')
          ->unique()
          ->sort()
          ->values();

        $glues = $products->filter(function ($product) {
            return isset($product->attributes['glue']);
        })->pluck('attributes.glue')
          ->unique()
          ->sort()
          ->values();

        $mixture_types = $products->filter(function ($product) {
            return isset($product->attributes['mixture_type']);
        })->pluck('attributes.mixture_type')
          ->unique()
          ->sort()
          ->values();

        $seams = $products->filter(function ($product) {
            return isset($product->attributes['seam']);
        })->pluck('attributes.seam')
          ->unique()
          ->sort()
          ->values();

        // Если какой-то фильтр уже выбран, оставляем только его значение
        if ($request->has('color')) {
            $colors = $colors->where('slug', $request->color);
        }

        if ($request->has('brand')) {
            $brands = $brands->where('slug', $request->brand);
        }

        if ($request->has('pattern')) {
            $patterns = $patterns->where('slug', $request->pattern);
        }

        if ($request->has('texture')) {
            $textures = $textures->where('slug', $request->texture);
        }

        if ($request->has('size')) {
            $sizes = $sizes->where('title', $request->size);
        }

        if ($request->has('category')) {
            $categories = $categories->where('slug', $request->category);
        }

        if ($request->has('weight')) {
            $weights = collect([$request->weight]);
        }

        if ($request->has('glue')) {
            $glues = collect([$request->glue]);
        }

        if ($request->has('mixture_type')) {
            $mixture_types = collect([$request->mixture_type]);
        }

        if ($request->has('seam')) {
            $seams = collect([$request->seam]);
        }

        return [
            'colors' => $colors,
            'brands' => $brands,
            'patterns' => $patterns,
            'textures' => $textures,
            'sizes' => $sizes,
            'categories' => $categories,
            'weights' => $weights,
            'glues' => $glues,
            'mixture_types' => $mixture_types,
            'seams' => $seams,
        ];
    }
}
