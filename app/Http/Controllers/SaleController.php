<?php

namespace App\Http\Controllers;

use App\Models\Product;
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
            ->where('sale', '>', 0);

        $title = 'Распродажа';

        $characteristicsQuery = clone $query;

        $filters = ['pattern_id', 'color_id', 'texture_id', 'size_id', 'category_id', 'brand_id'];
        foreach ($filters as $filter) {
            if ($request->has($filter)) {
                $query->where($filter, $request->input($filter));
            }
        }

        $allProducts = $characteristicsQuery->with([
            'color',
            'pattern',
            'category',
            'texture',
            'size',
            'brand'
        ])->get();

        $colors = $this->getFilteredAttribute($request, $allProducts, 'color', 'color_id');
        $categories = $this->getFilteredAttribute($request, $allProducts, 'category', 'category_id');
        $patterns = $this->getFilteredAttribute($request, $allProducts, 'pattern', 'pattern_id');
        $textures = $this->getFilteredAttribute($request, $allProducts, 'texture', 'texture_id');
        $sizes = $this->getFilteredAttribute($request, $allProducts, 'size', 'size_id');
        $brands = $this->getFilteredAttribute($request, $allProducts, 'brand', 'brand_id');

        $query = $this->applySorting($query, $request->input('sort'));

        $goods = $query->with(['color', 'pattern', 'category', 'texture', 'size', 'brand'])
            ->paginate(40);

        return view('pages.goods-sale', compact(
            'goods',
            'colors',
            'categories',
            'patterns',
            'textures',
            'sizes',
            'brands',
            'title'
        ));
    }

    private function getFilteredAttribute($request, $products, $relation, $filterId)
    {
        if ($request->has($filterId)) {
            $model = Product::where($filterId, $request->input($filterId))
                ->with($relation)
                ->first();
            return $model ? collect([$model->$relation])->filter() : collect();
        }

        return $products->pluck($relation)
            ->flatten()
            ->filter()
            ->unique('id')
            ->sortBy('title')
            ->values();
    }
}
