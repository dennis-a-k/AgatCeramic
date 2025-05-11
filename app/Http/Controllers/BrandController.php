<?php

namespace App\Http\Controllers;

use App\Http\Requests\BrandRequest;
use App\Models\Brand;
use App\Models\Product;
use App\Services\FilterService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BrandController extends Controller
{
    public function __construct(
        private FilterService $filterService
    ) {}

    public function index(Request $request)
    {
        $search = $request->input('search');

        $brands = Brand::query()
            ->when($search, function ($query) use ($search) {
                $query->where('title', 'LIKE', "%{$search}%");
            })
            ->orderBy('title', 'ASC')
            ->paginate(30);

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

    public function filterProducts(string $brandSlug, Request $request)
    {
        $brand = Brand::where('slug', $brandSlug)->first();

        if (!$brand) {
            return view('pages.goods-brand', [
                'goods' => new \Illuminate\Pagination\LengthAwarePaginator([], 0, 40),
                'brand' => null,
                'title' => '',
                'colors' => collect(),
                'patterns' => collect(),
                'textures' => collect(),
                'sizes' => collect(),
                'categories' => collect(),
                'weights' => collect(),
            ]);
        }

        // Формируем заголовок с первой заглавной буквой
        $title = mb_strtoupper(mb_substr($brand->title, 0, 1, 'UTF-8'), 'UTF-8') .
            mb_substr($brand->title, 1, null, 'UTF-8');

        // Создаем базовый запрос
        $query = Product::where('brand_id', $brand->id)
            ->where('is_published', true);

        // Применяем фильтры из запроса
        $this->filterService->applyActiveFilters($query, $request);

        // Получаем товары с пагинацией
        $goods = $this->filterService->getFilteredProducts($query, $request, [
            'color',
            'category',
            'pattern',
            'texture',
            'size'
        ]);

        // Получаем доступные фильтры
        $filters = $this->filterService->getAvailableFilters($query, $request);

        return view('pages.goods-brand', array_merge([
            'goods' => $goods,
            'brand' => $brand,
            'title' => $title,
        ], $filters));
    }
}
