<?php

namespace App\Http\Controllers;

use App\Exports\ProductsExport;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\UpdatProductRequest;
use App\Imports\ProductsImport;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Collection;
use App\Models\Color;
use App\Models\Country;
use App\Models\Image;
use App\Models\Pattern;
use App\Models\Product;
use App\Models\Size;
use App\Models\Texture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class GoodsController extends Controller
{
    public function index()
    {
        $goods = Product::query()->orderBy('sku', 'ASC')->get();
        return view('pages.admin.goods.goods', ['goods' => $goods]);
    }

    public function create()
    {
        $categories = Category::all();
        $sizes = Size::all();
        $patterns = Pattern::all();
        $textures = Texture::all();
        $colors = Color::all();
        $brands = Brand::all();
        $collections = Collection::all();
        $countries = Country::all();
        return view('pages.admin.goods.add-product', compact(
            'categories',
            'sizes',
            'patterns',
            'textures',
            'colors',
            'brands',
            'collections',
            'countries',
        ));
    }

    public function store(ProductRequest $request)
    {
        $data = $request->validated();
        $product = Product::create($data);
        if ($request->hasFile('imgs')) {
            foreach ($request->file('imgs') as $index => $img) {
                if ($index >= 5) break; // Ограничение до 5 изображений
                $filename = $product->sku . '_' . $index . '.' . $img->getClientOriginalExtension();
                $img->storeAs('public/images', $filename);
                $product->images()->create(['title' => $filename,'order' => $index]);
            }
        }
        return back()->with('status', 'product-created');
    }

    public function edit(string $id)
    {
        $product = Product::find($id);
        $categories = Category::all();
        $sizes = Size::all();
        $patterns = Pattern::all();
        $textures = Texture::all();
        $colors = Color::all();
        $brands = Brand::all();
        $collections = Collection::all();
        $countries = Country::all();
        $currentImageCount = $product->images->count();
        return view('pages.admin.goods.edit-product', compact(
            'product',
            'categories',
            'sizes',
            'patterns',
            'textures',
            'colors',
            'brands',
            'collections',
            'countries',
            'currentImageCount',
        ));
    }

    public function update(UpdatProductRequest $request, string $id)
    {
        $data = $request->validated();
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
                if ($currentImageCount + $index >= 5) break; // Максимум 5 изображений
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

    public function destroy(Request $request)
    {
        $product = Product::find($request->id)->get();
        foreach ($product->images as $image) {
            Storage::delete('public/images/' . $image->title);
        }
        $product->delete();
        return back();
    }

    public function updatePrice(Request $request, string $id)
    {
        $request->validate([
            'price' => ['required', 'numeric', 'between:0.00,99999.99'],
        ]);
        Product::where('id', $id)->update(['price' => $request->price]);
        return back();
    }

    public function deleteImage(Image $image)
    {
        Storage::delete('public/images/' . $image->title);
        $image->delete();
        return back();
    }

    public function updatePublished(Request $request, string $id)
    {
        $request->validate([
            'is_published' => ['required', 'string'],
        ]);
        Product::where('id', $id)->update(['is_published' => $request->is_published]);
        return back();
    }

    public function updateSale(Request $request, string $id)
    {
        $request->validate([
            'sale' => ['required', 'string'],
        ]);
        Product::where('id', $id)->update(['sale' => $request->sale]);
        return back();
    }

    public function import(Request $request)
    {
        Excel::import(new ProductsImport, $request->file('fileExcel'));
        return redirect()->back()->with('status', 'template-loaded');
    }

    public function export()
    {
        return Excel::download(new ProductsExport, 'goods-AC.xlsx');
    }
}
