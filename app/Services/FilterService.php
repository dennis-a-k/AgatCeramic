<?php

namespace App\Services;

use App\Models\Category;
use App\Models\Product;
use App\Traits\SortableProducts;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class FilterService
{
    use SortableProducts;

    public function getBaseQuery(string $type, ?string $slug, ?string &$title): Builder
    {
        $query = Product::query()->where('is_published', true);
        $title = '';

        if ($slug) {
            $model = 'App\\Models\\' . ucfirst($type);
            $item = $model::where('slug', $slug)->firstOrFail();
            $query->where("{$type}_id", $item->id);
            $title = $item->title;
        }

        return $query;
    }

    public function applyActiveFilters(Builder $query, Request $request): void
    {
        $filters = [
            'category' => fn($q, $v) => $q->whereHas('category', fn($q) => $q->where('slug', $v)),
            'subcategory' => fn($q, $v) => $q->whereHas('subcategory', fn($q) => $q->where('slug', $v)),
            'brand' => fn($q, $v) => $q->whereHas('brand', fn($q) => $q->where('slug', $v)),
            'pattern' => fn($q, $v) => $q->whereHas('pattern', fn($q) => $q->where('slug', $v)),
            'color' => fn($q, $v) => $q->whereHas('color', fn($q) => $q->where('slug', $v)),
            'texture' => fn($q, $v) => $q->whereHas('texture', fn($q) => $q->where('slug', $v)),
            'size' => fn($q, $v) => $q->whereHas('size', fn($q) => $q->where('title', $v)),
            'weight' => fn($q, $v) => $q->where('attributes->weight_kg', (float)$v),
            'glue' => fn($q, $v) => $q->whereJsonContains('attributes->glue', $v),
            'mixture_type' => fn($q, $v) => $q->whereJsonContains('attributes->mixture_type', $v),
            'seam' => fn($q, $v) => $q->whereJsonContains('attributes->seam', $v),
        ];

        foreach ($filters as $key => $callback) {
            if ($request->has($key)) {
                $callback($query, $request->$key);
            }
        }
    }

    public function getAvailableFilters(Builder $query, Request $request): array
    {
        return [
            'colors' => $this->getFilterValues($query, $request->color, 'App\Models\Color', 'color'),
            'brands' => $this->getFilterValues($query, $request->brand, 'App\Models\Brand', 'brand'),
            'patterns' => $this->getFilterValues($query, $request->pattern, 'App\Models\Pattern', 'pattern'),
            'textures' => $this->getFilterValues($query, $request->texture, 'App\Models\Texture', 'texture'),
            'sizes' => $this->getFilterValues($query, $request->size, 'App\Models\Size', 'size', 'title'),
            'categories' => $this->getFilterValues($query, $request->category, 'App\Models\Category', 'category'),
            'subcategories' => $this->getFilterValues($query, $request->subcategory, 'App\Models\Category', 'subcategory'),
            'weights' => $this->getWeightFilterValues($query, $request->weight),
            'glues' => $this->getAttributeFilterValues($query, 'glue', $request->glue),
            'mixture_types' => $this->getAttributeFilterValues($query, 'mixture_type', $request->mixture_type),
            'seams' => $this->getAttributeFilterValues($query, 'seam', $request->seam),
        ];
    }

    public function getFilteredProducts(Builder $query, Request $request, array $with = []): Collection|LengthAwarePaginator
    {
        return $this->applySorting($query, $request->input('sort'))
            ->with(array_merge(['color', 'pattern', 'brand', 'texture', 'size', 'subcategory'], $with))
            ->paginate(40);
    }

    protected function getFilterValues(
        Builder $query,
        ?string $currentValue,
        string $modelClass,
        string $relation,
        string $field = 'slug'
    ): Collection {
        $items = $query->clone()
            ->with($relation)
            ->get()
            ->pluck($relation)
            ->filter()
            ->unique('id')
            ->sortBy('title')
            ->values();

        if ($currentValue) {
            return collect([$modelClass::where($field, $currentValue)->first()])->filter();
        }

        return $items;
    }

    protected function getWeightFilterValues(Builder $query, $currentWeight = null): Collection
    {
        $weights = $query->clone()
            ->get()
            ->pluck('attributes.weight_kg')
            ->filter(function ($value) {
                return !is_null($value) && $value !== '';
            })
            ->unique()
            ->sort()
            ->values();

        if ($currentWeight) {
            return collect([(float)$currentWeight])->filter();
        }

        return $weights;
    }

    protected function getAttributeFilterValues(Builder $query, string $attribute, $currentValue = null): Collection
    {
        $values = $query->clone()
            ->get()
            ->pluck("attributes.{$attribute}")
            ->filter()
            ->unique()
            ->sort()
            ->values();

        if ($currentValue) {
            return collect([$currentValue])->filter();
        }

        return $values;
    }

    public function getNestedCategoryIds(Category $category): array
    {
        $ids = [$category->id];

        foreach ($category->children as $child) {
            $ids = array_merge($ids, $this->getNestedCategoryIds($child));
        }

        return $ids;
    }

    public function applyCategoryFilterWithNested(Builder $query, string $slug): void
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        $categoryIds = $this->getNestedCategoryIds($category);

        $query->whereIn('category_id', $categoryIds);
    }
}
