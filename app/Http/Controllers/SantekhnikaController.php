<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Services\FilterService;
use App\Services\SessionService;
use Illuminate\Http\Request;

class SantekhnikaController extends Controller
{
    public function __construct(
        private FilterService $filterService,
        private SessionService $sessionService
    ) {}

    public function index()
    {
        $santexnika = Category::where('title', config('categories.santexnika'))->first() ?? '';
        $plumbing = !empty($santexnika) ? Category::with('children.children')->where('id', $santexnika->id)->firstOrFail() : '';
        return view('pages.plumbing', ['title' => config('categories.santexnika'), 'plumbing' => $plumbing]);
    }

    public function filterPlumbing(string $categorySlug, Request $request)
    {
        $this->sessionService->applyFilter($request, 'category');

        $rootCategory = Category::where('title', config('categories.santexnika'))->firstOrFail();

        if ($categorySlug === $rootCategory->slug) {
            $categoryIds = $this->filterService->getNestedCategoryIds($rootCategory);
            $query = Product::whereIn('category_id', $categoryIds)->where('is_published', true);
        } else {
            $currentCategory = Category::where('slug', $categorySlug)->firstOrFail();
            $categoryIds = $this->filterService->getNestedCategoryIds($currentCategory);
            $query = Product::whereIn('category_id', $categoryIds)->where('is_published', true);
        }

        $this->filterService->applyActiveFilters($query, $request);

        $goods = $this->filterService->getFilteredProducts($query, $request);
        $filters = $this->filterService->getAvailableFilters($query, $request);

        return view('pages.goods', array_merge([
            'goods' => $goods,
            'category' => $currentCategory ?? $rootCategory,
            'root_category' => $rootCategory,
            'title' => $currentCategory->title ?? $rootCategory->title,
        ], $filters));
    }
}
