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

    public function index()
    {
        $categories = Category::query()->orderBy('title', 'ASC')->get();
        return view('pages.admin.categories', ['categories' => $categories]);
    }

    public function store(CategoryRequest $request)
    {
        $data = $request->validated();
        $data['slug'] = Str::slug($data['title']);
        Category::create($data);
        return back()->with('status', 'category-created');
    }

    public function update(CategoryRequest $request)
    {
        $data = $request->validated();
        $data['slug'] = Str::slug($data['title']);
        Category::where('id', $request->id)->update($data);
        return back()->with('status', 'category-updated');
    }

    public function destroy(Request $request)
    {
        Category::find($request->id)->delete();
        return back();
    }

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
