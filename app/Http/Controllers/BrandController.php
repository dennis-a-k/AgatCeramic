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

    public function index(Request $request)
    {
        $search = $request->input('search');

        $brands = Brand::query()
            ->when($search, function ($query) use ($search) {
                $query->where('title', 'LIKE', "%{$search}%");
            })
            ->orderBy('title', 'ASC')
            ->paginate(25);

        return view('pages.admin.brands', [
            'brands' => $brands,
            'search' => $search
        ]);
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
            $baseQuery = Product::where('brand_id', $brand->id)
                ->where('is_published', true);
            // Клонируем запрос для получения всех характеристик
            $characteristicsQuery = clone $baseQuery;

            // Получаем все товары для извлечения характеристик (без пагинации)
            $allBrandProducts = $characteristicsQuery->with([
                'color',
                'category',
                'pattern',
                'texture',
                'size'
            ])->get();

            // Получаем все характеристики
            $colors = $allBrandProducts->pluck('color')
                ->flatten()
                ->filter()
                ->unique('id')
                ->sortBy('title')
                ->values();

            $categories = $allBrandProducts->pluck('category')
                ->flatten()
                ->filter()
                ->unique('id')
                ->sortBy('title')
                ->values();

            $patterns = $allBrandProducts->pluck('pattern')
                ->flatten()
                ->filter()
                ->unique('id')
                ->sortBy('title')
                ->values();

            $textures = $allBrandProducts->pluck('texture')
                ->flatten()
                ->filter()
                ->unique('id')
                ->sortBy('title')
                ->values();

            $sizes = $allBrandProducts->pluck('size')
                ->flatten()
                ->filter()
                ->unique('id')
                ->sortBy('title')
                ->values();

            // Применяем сортировку к базовому запросу
            $query = $this->applySorting($baseQuery, $request->input('sort'));

            // Получаем товары с пагинацией
            $goods = $query->with(['color', 'category', 'pattern', 'texture', 'size'])
                ->paginate(40);
        } else {
            $goods = new \Illuminate\Pagination\LengthAwarePaginator([], 0, 40);
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

    public function slider()
    {
        $brands = Brand::whereNotNull('img')
            ->where('img', '!=', '')
            ->get();
        return view('index', compact('brands'));
    }
}
