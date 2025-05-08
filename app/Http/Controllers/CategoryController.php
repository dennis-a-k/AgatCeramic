<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Services\FilterService;
use App\Services\SessionService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function __construct(
        private FilterService $filterService,
        private SessionService $sessionService
    ) {}

    public function filterProducts(string $categorySlug, Request $request)
    {
        $this->sessionService->applyFilter($request, 'category');

        $query = $this->filterService->getBaseQuery('category', $categorySlug, $title);
        $this->filterService->applyActiveFilters($query, $request);

        $goods = $this->filterService->getFilteredProducts($query, $request);
        $filters = $this->filterService->getAvailableFilters($query, $request);

        $category = Category::where('slug', $categorySlug)->first();

        if ($category) {
            $title = mb_strtoupper(mb_substr($category->title, 0, 1, 'UTF-8'), 'UTF-8') .
                mb_substr($category->title, 1, null, 'UTF-8');
        }

        return view('pages.goods', array_merge([
            'goods' => $goods,
            'category' => $category,
            'title' => $title,
        ], $filters));
    }
}
