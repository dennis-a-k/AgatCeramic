<?php

namespace App\Http\Controllers;

use App\Exports\ProductsExport;
use App\Imports\ProductsImport;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Collection;
use App\Models\Color;
use App\Models\Country;
use App\Models\Pattern;
use App\Models\Product;
use App\Models\Size;
use App\Models\Texture;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class GoodsController extends Controller
{
    public function import(Request $request)
    {
        Excel::import(new ProductsImport, $request->file('files'));
        return redirect()->back();
    }

    public function export()
    {
        return Excel::download(new ProductsExport, 'goods-AC.xlsx');
    }

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

    // public function store(ProductRequest $request)
    // {
    //     $data = $request->validated();
    //     $product = Product::create($data);
    //     if (isset($data['imgs'])) {
    //         foreach ($data['imgs'] as $key => $img) {
    //             $name = $product->article . '_' . $key . '.' . $img->getClientOriginalExtension();
    //             $filePath = Storage::disk('public')->putFileAs('/images', $img, $name);
    //             Image::create([
    //                 'product_id' => $product->id,
    //                 'img' => $filePath,
    //                 'url' => url('/storage/' . $filePath),
    //             ]);
    //         }
    //         unset($data['imgs']);
    //     }
    //     return back()->with('status', 'product-created');
    // }

    public function destroy(Request $request)
    {
        Product::find($request->id)->delete();
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

    public function updatePublished(Request $request, string $id)
    {
        $request->validate([
            'is_published' => ['required', 'string'],
        ]);
        Product::where('id', $id)->update(['is_published' => $request->is_published]);
        return back();
    }
}
