<?php

namespace App\Http\Controllers;

use App\Http\Requests\BrandRequest;
use App\Models\Brand;
use App\Models\Product;
use App\Traits\SortableProducts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BrandController extends Controller
{
    use SortableProducts;

    public function index()
    {
        $brands = Brand::orderBy('title', 'ASC')->get();
        return view('pages.admin.brands', compact('brands'));
    }

    public function store(BrandRequest $request)
    {
        $brand = new Brand($request->validated());
        $this->handleImageUpload($brand, $request);
        $brand['slug'] = Str::slug($brand['title']);
        $brand->save();
        return back()->with('status', 'brand-created');
    }

    public function update(BrandRequest $request)
    {
        $brand = Brand::findOrFail($request->id);
        $brand['slug'] = Str::slug($brand['title']);
        $brand->fill($request->validated());
        $this->handleImageUpload($brand, $request, true);
        $brand->save();
        return back()->with('status', 'brand-updated');
    }

    public function destroy(Request $request)
    {
        $brand = Brand::findOrFail($request->id);
        $this->deleteImage($brand);
        $brand->delete();
        return back()->with('status', 'brand-deleted');
    }

    private function handleImageUpload(Brand $brand, BrandRequest $request, bool $isUpdate = false)
    {
        if ($request->hasFile('img')) {
            if ($isUpdate && $brand->img) {
                $this->deleteImage($brand);
            }
            $slug = Str::slug($brand->title);
            $extension = $request->file('img')->getClientOriginalExtension();
            $fileName = "{$slug}_brand.{$extension}";
            $request->file('img')->storeAs('public/brands', $fileName);
            $brand->img = $fileName;
        }
    }

    private function deleteImage(Brand $brand)
    {
        if ($brand->img) {
            Storage::disk('public')->delete('brands/' . $brand->img);
        }
    }

    public function filterProducts(string $brandSlug, Request $request, string $title = '')
    {
        $brand = Brand::where('slug', $brandSlug)->first();
        if ($brand) {
            $title = mb_strtoupper(mb_substr($brand->title, 0, 1, 'UTF-8'), 'UTF-8') . mb_substr($brand->title, 1, null, 'UTF-8');
            $query = Product::where('brand_id', $brand->id)
                ->where('is_published', true);
            // Применяем сортировку
            $query = $this->applySorting($query, $request->input('sort'));
            // Получаем товары
            $goods = $query->with(['color', 'pattern', 'texture', 'size', 'category'])
                ->get();
            // Получаем уникальные значения через связанные таблицы
            $colors = $goods->pluck('color')->flatten()->filter()->unique('id')->sortBy(function ($color) {
                return $color->title;
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
            $categories = $goods->pluck('category')->flatten()->filter()->unique('id')->sortBy(function ($category) {
                return $category->title;
            });
        } else {
            $goods = collect();
            $colors = collect();
            $patterns = collect();
            $textures = collect();
            $sizes = collect();
            $categories = collect();
        }
        return view('pages.goods-brand', compact(
            'goods',
            'brand',
            'title',
            'colors',
            'patterns',
            'textures',
            'sizes',
            'categories'
        ));
    }
}
