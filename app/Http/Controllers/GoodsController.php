<?php

namespace App\Http\Controllers;

use App\Exports\GoodsExport;
use App\Exports\GoodsTemplateExport;
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
use Illuminate\Support\Str;

class GoodsController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $sortField = $request->input('sort', 'created_at');
        $sortDirection = $request->input('direction', 'desc');

        $goods = Product::query()
            ->when($search, function ($query) use ($search) {
                $query->where('sku', 'LIKE', "%{$search}%")
                    ->orWhere('title', 'LIKE', "%{$search}%")
                    ->orWhere('product_code', 'LIKE', "%{$search}%");
            })
            ->orderBy($sortField, $sortDirection)
            ->paginate(50);

        return view('pages.admin.goods.goods', [
            'goods' => $goods,
            'search' => $search,
            'sortField' => $sortField,
            'sortDirection' => $sortDirection
        ]);
    }

    public function create()
    {
        $includedCategories = [
            config('categories.keramogranit'),
            config('categories.plitka'),
            config('categories.mozaika'),
            config('categories.klinker'),
            config('categories.stupeni'),
        ];

        $categories = Category::whereIn('title', $includedCategories)->get();
        $santexnika = Category::where('title', config('categories.santexnika'))->first() ?? '';
        $plumbing = !empty($santexnika) ? Category::with('children.children')->where('id', $santexnika->id)->firstOrFail() : '';
        $sizes = Size::all();
        $patterns = Pattern::all();
        $textures = Texture::all();
        $colors = Color::all();
        $brands = Brand::all();
        $collections = Collection::all();
        $countries = Country::all();
        return view('pages.admin.goods.add-product', compact(
            'categories',
            'plumbing',
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
        $data['slug'] = Str::slug($data['title']);
        $data['sku'] = Product::generateSku($data['category_id']);
        $product = Product::create($data);
        if ($request->hasFile('imgs')) {
            foreach ($request->file('imgs') as $index => $img) {
                if ($index >= 5) break; // Ограничение до 5 изображений
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
        $data['slug'] = Str::slug($data['title']);
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
        $product = Product::find($request->id);
        if (isset($product->images)) {
            foreach ($product->images as $image) {
                Storage::delete('public/images/' . $image->title);
            }
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
        return Excel::download(new GoodsExport, 'goods-AC.xlsx');
    }

    public function ceramicTemplateExport()
    {
        return Excel::download(new GoodsTemplateExport, 'ceramic-template-AC.xlsx');
    }
}
