<?php

namespace App\Http\Controllers;

use App\Http\Requests\PlumbingRequest;
use App\Http\Requests\UpdatePlumbingRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Country;
use App\Models\Image;
use App\Models\Product;
use App\Services\FilterService;
use App\Services\SessionService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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

    public function store(PlumbingRequest $request)
    {
        $validated = $request->validated();

        $productData = [
            'sku' => Product::generateSku($validated['parent_id']),
            'title' => $validated['title'],
            'price' => $validated['price'],
            'unit' => $validated['unit'],
            'description' => $validated['description'],
            'slug' => Str::slug($validated['title']),
            'category_id' => $validated['parent_id'],
            'subcategory_id' => $validated['subcategory_id'],
            'color_id' => $validated['color_id'],
            'brand_id' => $validated['brand_id'],
            'country_id' => $validated['country_id'],
            'attributes' => [],
        ];

        if (isset($validated['dimensions'])) {
            $productData['attributes']['dimensions'] = $validated['dimensions'];
        }

        $product = Product::create($productData);

        if ($request->hasFile('imgs')) {
            foreach ($request->file('imgs') as $index => $img) {
                if ($index >= 3) break;
                $filename = $product->sku . '_' . $index . '.' . $img->getClientOriginalExtension();
                $img->storeAs('public/images', $filename);
                $product->images()->create(['title' => $filename, 'order' => $index]);
            }
        }

        return back()->with('status', 'product-created');
    }

    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        $santexnika = Category::where('title', config('categories.santexnika'))->first() ?? '';
        $plumbing = !empty($santexnika) ? Category::with('children.children')->where('id', $santexnika->id)->firstOrFail() : '';
        $colors = Color::all();
        $brands = Brand::all();
        $countries = Country::all();
        $currentImageCount = $product->images->count();
        return view('pages.admin.goods.edit-plumbing', compact(
            'product',
            'plumbing',
            'colors',
            'brands',
            'countries',
            'currentImageCount',
        ));
    }

    public function update(UpdatePlumbingRequest $request, string $id)
    {
        $data = $request->validated();
        $data['slug'] = Str::slug($data['title']);
        $data['attributes']['dimensions'] = $data['dimensions'];
        $product = Product::find($id);
        $product->fill($data)->save();

        if ($request->has('image_order')) {
            foreach ($request->image_order as $imageId => $order) {
                $image = Image::find($imageId);
                if ($image && $image->product_id == $product->id) {
                    $image->update(['order' => $order]);
                }
            }
        }

        if ($request->hasFile('imgs')) {
            $currentImageCount = $product->images->count();
            foreach ($request->file('imgs') as $index => $img) {
                if ($currentImageCount + $index >= 3) break; // Максимум 5 изображений
                $filename = $product->sku . '_' . $currentImageCount + $index . '.' . $img->getClientOriginalExtension();
                $img->storeAs('public/images', $filename);
                $product->images()->create([
                    'title' => $filename,
                    'order' => $currentImageCount + $index
                ]);
            }
        }
        return back()->with('status', 'product-updated');
    }

    public function filterPlumbing(string $categorySlug, Request $request)
    {
        $this->sessionService->applyFilter($request, 'category');

        $rootCategory = Category::with('children.children')->where('slug', $categorySlug)->firstOrFail();

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

        $subcategories = $rootCategory->children;

        return view('pages.goods', array_merge([
            'goods' => $goods,
            'category' => $currentCategory ?? $rootCategory,
            'subcategories' => $subcategories,
            'title' => $currentCategory->title ?? $rootCategory->title,
            'slug' => $currentCategory->slug ?? $rootCategory->slug,
        ], $filters));
    }
}
