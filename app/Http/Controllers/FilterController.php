<?php

namespace App\Http\Controllers;

use App\Services\FilterService;
use App\Services\SessionService;
use App\Models\{Brand, Category};
use Illuminate\Http\Request;

class FilterController extends Controller
{
    public function __construct(
        private FilterService $filterService,
        private SessionService $sessionService
    ) {}

    public function filter(Request $request)
    {
        $this->sessionService->applyFilter($request, 'category');
        $slug = $this->sessionService->getSlug('category');

        $query = $this->filterService->getBaseQuery('category', $slug, $title);
        $this->filterService->applyActiveFilters($query, $request);

        $goods = $this->filterService->getFilteredProducts($query, $request);
        $filters = $this->filterService->getAvailableFilters($query, $request);

        return view('pages.goods', array_merge([
            'goods' => $goods,
            'title' => $title,
            'category' => Category::where('slug', $slug)->first(),
        ], $filters));
    }

    public function filters(Request $request)
    {
        $this->sessionService->applyFilter($request, 'brand');
        $slug = $this->sessionService->getSlug('brand');

        $query = $this->filterService->getBaseQuery('brand', $slug, $title);
        $this->filterService->applyActiveFilters($query, $request);

        $goods = $this->filterService->getFilteredProducts($query, $request, ['color', 'pattern', 'category', 'texture', 'size']);
        $filters = $this->filterService->getAvailableFilters($query, $request);

        return view('pages.goods-brand', array_merge([
            'goods' => $goods,
            'title' => $title,
            'brand' => Brand::where('slug', $slug)->first(),
        ], $filters));
    }
}
