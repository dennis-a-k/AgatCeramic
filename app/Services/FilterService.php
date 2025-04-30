<?php

namespace App\Services;

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
            'category' => fn ($q, $v) => $q->whereHas('category', fn ($q) => $q->where('slug', $v)),
            'brand' => fn ($q, $v) => $q->whereHas('brand', fn ($q) => $q->where('slug', $v)),
            'pattern' => fn ($q, $v) => $q->whereHas('pattern', fn ($q) => $q->where('slug', $v)),
            'color' => fn ($q, $v) => $q->whereHas('color', fn ($q) => $q->where('slug', $v)),
            'texture' => fn ($q, $v) => $q->whereHas('texture', fn ($q) => $q->where('slug', $v)),
            'size' => fn ($q, $v) => $q->whereHas('size', fn ($q) => $q->where('title', $v)),
            'weight' => fn ($q, $v) => $q->where('attributes->weight_kg', (float)$v),
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
            'weights' => $this->getWeightFilterValues($query, $request->weight),
        ];
    }

    public function getFilteredProducts(Builder $query, Request $request, array $with = []): Collection|LengthAwarePaginator
    {
        return $this->applySorting($query, $request->input('sort'))
            ->with(array_merge(['color', 'pattern', 'brand', 'texture', 'size'], $with))
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
            ->pluck('attributes->weight_kg')
            ->filter()
            ->unique()
            ->sort()
            ->values();

        if ($currentWeight) {
            return collect([(float)$currentWeight])->filter();
        }

        return $weights;
    }
}
