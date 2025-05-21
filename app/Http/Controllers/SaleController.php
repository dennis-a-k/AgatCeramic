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
        $query = Product::query()
            ->where('is_published', true)
            ->whereNotNull('sale')
            ->where('sale', '>', 0)
            ->with(['color', 'pattern', 'brand', 'texture', 'size', 'category', 'subcategory']);

        $this->applyFilters($query, $request);

        // Получаем текущую категорию (если есть)
        $currentCategory = $request->has('category')
            ? Category::where('slug', $request->category)->first()
            : null;

        // Получаем корневую категорию (если есть)
        $rootCategory = $currentCategory ? ($currentCategory->parent ?? $currentCategory) : null;

        $filteredProductsQuery = clone $query;
        $filteredProducts = $filteredProductsQuery->get();

        $filters = $this->getAvailableFilters($filteredProducts, $request);

        // Инициализируем пустую коллекцию подкатегорий
        $subcategories = collect();

        // Если выбрана категория, получаем подкатегории из отфильтрованных товаров
        if ($currentCategory) {
            $subcategories = $filteredProducts
                ->pluck('subcategory')
                ->unique('id')
                ->filter()
                ->sortBy('title')
                ->values();

            // Фильтруем подкатегории, чтобы они принадлежали текущей категории
            $subcategories = $subcategories->filter(function ($subcategory) use ($currentCategory) {
                return $subcategory && $subcategory->parent_id === $currentCategory->id;
            });
        }

        // Добавляем подкатегории в фильтры
        $filters['subcategories'] = $subcategories;
        $filters['root_category'] = $rootCategory;

        $query = $this->applySorting($query, $request->input('sort'));

        $goods = $query->paginate(40);

        return view('pages.goods-sale', array_merge([
            'goods' => $goods,
            'title' => 'Распродажа',
            'current_category' => $currentCategory,
        ], $filters));
    }

    private function applyFilters($query, Request $request)
    {
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

        if ($request->has('category')) {
            $category = Category::where('slug', $request->category)->first();
            if ($category) {
                // Фильтрация с учетом вложенности
                $categoryIds = $this->getNestedCategoryIds($category);
                $query->whereIn('category_id', $categoryIds);
            }
        }

        if ($request->has('subcategory')) {
            $subcategory = Category::where('slug', $request->subcategory)->first();
            if ($subcategory) {
                $query->where('subcategory_id', $subcategory->id);
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

        if ($request->has('weight')) {
            $weight = $request->weight;
            $query->whereJsonContains('attributes->weight_kg', $weight);
        }

        if ($request->has('glue')) {
            $glue = $request->glue;
            $query->whereJsonContains('attributes->glue', $glue);
        }

        if ($request->has('mixture_type')) {
            $mixture_type = $request->mixture_type;
            $query->whereJsonContains('attributes->mixture_type', $mixture_type);
        }

        if ($request->has('seam')) {
            $seam = $request->seam;
            $query->whereJsonContains('attributes->seam', $seam);
        }
    }

    private function getNestedCategoryIds(Category $category): array
    {
        $ids = [$category->id];

        foreach ($category->children as $child) {
            $ids = array_merge($ids, $this->getNestedCategoryIds($child));
        }

        return $ids;
    }

    private function getAvailableFilters($products, Request $request)
    {
        // Получаем текущую категорию (если есть)
        $currentCategory = $request->has('category')
            ? Category::where('slug', $request->category)->first()
            : null;

        // Если категория выбрана, фильтруем товары по ней (чтобы учитывать только её характеристики)
        if ($currentCategory) {
            $categoryIds = $this->getNestedCategoryIds($currentCategory);
            $products = $products->filter(function ($product) use ($categoryIds) {
                return in_array($product->category_id, $categoryIds);
            });
        }

        // Далее стандартная логика, но теперь $products уже отфильтрованы по категории
        $colors = $products->pluck('color')
            ->unique('id')
            ->filter()
            ->sortBy('title')
            ->values();

        $brands = $products->pluck('brand')
            ->unique('id')
            ->filter()
            ->sortBy('title')
            ->values();

        $patterns = $products->pluck('pattern')
            ->unique('id')
            ->filter()
            ->sortBy('title')
            ->values();

        $textures = $products->pluck('texture')
            ->unique('id')
            ->filter()
            ->sortBy('title')
            ->values();

        $sizes = $products->pluck('size')
            ->unique('id')
            ->filter()
            ->sortBy('title')
            ->values();

        $categories = $products->pluck('category')
            ->unique('id')
            ->filter()
            ->sortBy('title')
            ->values();

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

        // Оставляем логику фильтрации по выбранным значениям (если нужно)
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
