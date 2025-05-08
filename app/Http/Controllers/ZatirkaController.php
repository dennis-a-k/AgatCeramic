<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateZatirkaRequest;
use App\Http\Requests\ZatirkaRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Country;
use App\Models\Image;
use App\Models\Product;
use Illuminate\Support\Str;

class ZatirkaController extends Controller
{
    public function store(ZatirkaRequest $request)
    {
        $validated = $request->validated();

        $categoryName = config('categories.zatirka');
        $category = Category::where('title', $categoryName)->first();

        if (!$category) {
            return back()->with('error', 'Категория не найдена');
        }

        $productData = [
            'sku' => $validated['sku'],
            'title' => $validated['title'],
            'price' => $validated['price'],
            'unit' => $validated['unit'],
            'description' => $validated['description'],
            'slug' => Str::slug($validated['title']),
            'category_id' => $category->id,
            'color_id' => $validated['color_id'],
            'brand_id' => $validated['brand_id'],
            'country_id' => $validated['country_id'],
            'attributes' => [],
        ];

        if (isset($validated['weight_kg'])) {
            $productData['attributes']['weight_kg'] = $validated['weight_kg'];
        }

        if (isset($validated['glue'])) {
            $productData['attributes']['glue'] = $validated['glue'];
        }

        if (isset($validated['mixture_type'])) {
            $productData['attributes']['mixture_type'] = $validated['mixture_type'];
        }

        if (isset($validated['seam'])) {
            $productData['attributes']['seam'] = $validated['seam'];
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
        $categories = Category::all();
        $colors = Color::all();
        $brands = Brand::all();
        $countries = Country::all();
        $currentImageCount = $product->images->count();
        return view('pages.admin.goods.edit-zatirka', compact(
            'product',
            'categories',
            'colors',
            'brands',
            'countries',
            'currentImageCount',
        ));
    }

    public function update(UpdateZatirkaRequest $request, string $id)
    {
        $data = $request->validated();
        $data['slug'] = Str::slug($data['title']);
        $data['attributes']['weight_kg'] = $data['weight_kg'];
        $data['attributes']['glue'] = $data['glue'];
        $data['attributes']['mixture_type'] = $data['mixture_type'];
        $data['attributes']['seam'] = $data['seam'];
        $product = Product::find($id);
        $product->fill($data)->save();
        // Обновление порядка существующих изображений
        if ($request->has('image_order')) {
            foreach ($request->image_order as $imageId => $order) {
                $image = Image::find($imageId);
                if ($image && $image->product_id == $product->id) {
                    $image->update(['order' => $order]);
                }
            }
        }
        // Добавление новых изображений
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
}
