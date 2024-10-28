<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Pattern;
use App\Models\Product;
use App\Models\Size;
use App\Models\Texture;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
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

    public function filterProducts(string $categorySlug, string $title = '')
    {
        $category = Category::where('slug', $categorySlug)->first();
        if ($category) {
            $title = $category->title;
            $goods = Product::where('category_id', $category->id)
                ->where('is_published', true)
                ->orderBy('created_at', 'DESC')
                ->with(['color', 'brand', 'pattern', 'texture', 'size'])
                ->get();
            // Получаем уникальные значения через связанные таблицы
            $colors = $goods->pluck('color')->flatten()->filter()->unique('id');
            $brands = $goods->pluck('brand')->flatten()->filter()->unique('id');
            $patterns = $goods->pluck('pattern')->flatten()->filter()->unique('id');
            $textures = $goods->pluck('texture')->flatten()->filter()->unique('id');
            $sizes = $goods->pluck('size')->flatten()->filter()->unique('id');
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
