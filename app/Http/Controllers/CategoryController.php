<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Models\Product;
use App\Traits\SortableProducts;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    use SortableProducts;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::query()->orderBy('title', 'ASC')->get();
        return view('pages.admin.categories', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        $data = $request->validated();
        $data['slug'] = Str::slug($data['title']);
        Category::create($data);
        return back()->with('status', 'category-created');
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request)
    {
        $data = $request->validated();
        $data['slug'] = Str::slug($data['title']);
        Category::where('id', $request->id)->update($data);
        return back()->with('status', 'category-updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        Category::find($request->id)->delete();
        return back();
    }

    public function filterProducts(string $categorySlug, Request $request, string $title = '')
    {
        $category = Category::where('slug', $categorySlug)->first();
        if ($category) {
            $title = mb_strtoupper(mb_substr($category->title, 0, 1, 'UTF-8'), 'UTF-8') . mb_substr($category->title, 1, null, 'UTF-8');
            $query = Product::where('category_id', $category->id)
                ->where('is_published', true);
            // Применяем сортировку
            $query = $this->applySorting($query, $request->input('sort'));
            // Получаем товары
            $goods = $query->with(['color', 'brand', 'pattern', 'texture', 'size'])
                ->get();
            // Получаем уникальные значения через связанные таблицы
            $colors = $goods->pluck('color')->flatten()->filter()->unique('id')->sortBy(function ($color) {
                return $color->title;
            });
            $brands = $goods->pluck('brand')->flatten()->filter()->unique('id')->sortBy(function ($brand) {
                return $brand->title;
            });
            $patterns = $goods->pluck('pattern')->flatten()->filter()->unique('id')->sortBy(function ($pattern) {
                return $pattern->title;
            });
            $textures = $goods->pluck('texture')->flatten()->filter()->unique('id')->sortBy(function ($texture) {
                return $texture->title;
            });
            $sizes = $goods->pluck('size')->flatten()->filter()->unique('id')->sortBy(function ($size) {
                return $size->title;
            });
        } else {
            $goods = collect();
            $colors = collect();
            $brands = collect();
            $patterns = collect();
            $textures = collect();
            $sizes = collect();
        }
        return view('pages.goods', compact(
            'goods',
            'category',
            'title',
            'colors',
            'brands',
            'patterns',
            'textures',
            'sizes',
        ));
    }
}
