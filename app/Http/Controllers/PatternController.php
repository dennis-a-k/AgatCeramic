<?php

namespace App\Http\Controllers;

use App\Http\Requests\PatternRequest;
use App\Models\Category;
use App\Models\Pattern;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PatternController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $patterns = Pattern::orderBy('title', 'ASC')->get();
        return view('pages.admin.patterns', compact('patterns'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PatternRequest $request)
    {
        $data = $request->validated();
        $data['slug'] = Str::slug($data['title']);
        Pattern::create($data);
        return back()->with('status', 'patterns-created');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PatternRequest $request)
    {
        $data = $request->validated();
        $data['slug'] = Str::slug($data['title']);
        Pattern::where('id', $request->id)->update($data);
        return back()->with('status', 'patterns-updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        Pattern::find($request->id)->delete();
        return back()->with('status', 'patterns-deleted');
    }

    public function filterProducts(string $categorySlug, string $patternSlug, string $title = '')
    {
        $category = Category::where('slug', $categorySlug)->firstOrFail();
        $pattern = Pattern::where('slug', $patternSlug)->firstOrFail();
        if ($category && $pattern) {
            $title = $category->title;
            $goods = Product::where('category_id', $category->id)
                ->where('pattern_id', $pattern->id)
                ->where('is_published', true)
                ->orderBy('created_at', 'DESC')
                ->with(['color', 'pattern', 'brand', 'texture', 'size'])
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
