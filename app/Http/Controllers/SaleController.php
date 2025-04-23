<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Pattern;
use App\Models\Product;
use App\Models\Size;
use App\Models\Texture;
use App\Traits\SortableProducts;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    use SortableProducts;

    public function saleFilter(Request $request)
    {
        $query = Product::query()
            ->where('is_published', true)
            ->whereNotNull('sale')
            ->where('sale', '>', 0);

        $title = 'Распродажа';

        $characteristicsQuery = clone $query;

        if ($request->has('pattern')) {
            $pattern = Pattern::where('slug', $request->pattern)->first();
            if ($pattern) {
                $query->where('pattern_id', $pattern->id);
            }
        }

        if ($request->has('color')) {
            $color = Color::where('slug', $request->color)->first();
            if ($color) {
                $query->where('color_id', $color->id);
            }
        }

        if ($request->has('category')) {
            $category = Category::where('slug', $request->category)->first();
            if ($category) {
                $query->where('category_id', $category->id);
            }
        }

        if ($request->has('texture')) {
            $texture = Texture::where('slug', $request->texture)->first();
            if ($texture) {
                $query->where('texture_id', $texture->id);
            }
        }

        if ($request->has('size')) {
            $size = Size::where('title', $request->size)->first();
            if ($size) {
                $query->where('size_id', $size->id);
            }
        }

        if ($request->has('brand')) {
            $brand = Brand::where('slug', $request->brand)->first();
            if ($brand) {
                $query->where('brand_id', $brand->id);
            }
        }

        $allProducts = $characteristicsQuery->with([
            'color',
            'pattern',
            'category',
            'texture',
            'size',
            'brand'
        ])->get();

        $colors = $request->has('color')
            ? collect([Color::where('slug', $request->color)->first()])->filter()
            : $allProducts->pluck('color')->flatten()->filter()->unique('id')->sortBy('title')->values();

        $brands = $request->has('brand')
            ? collect([Brand::where('slug', $request->brand)->first()])->filter()
            : $allProducts->pluck('brand')->flatten()->filter()->unique('id')->sortBy('title')->values();

        $patterns = $request->has('pattern')
            ? collect([Pattern::where('slug', $request->pattern)->first()])->filter()
            : $allProducts->pluck('pattern')->flatten()->filter()->unique('id')->sortBy('title')->values();

        $textures = $request->has('texture')
            ? collect([Texture::where('slug', $request->texture)->first()])->filter()
            : $allProducts->pluck('texture')->flatten()->filter()->unique('id')->sortBy('title')->values();

        $sizes = $request->has('size')
            ? collect([Size::where('title', $request->size)->first()])->filter()
            : $allProducts->pluck('size')->flatten()->filter()->unique('id')->sortBy('title')->values();

        $categories = $request->has('category')
            ? collect([Category::where('slug', $request->category)->first()])->filter()
            : $allProducts->pluck('category')->flatten()->filter()->unique('id')->sortBy('title')->values();

        $query = $this->applySorting($query, $request->input('sort'));

        $goods = $query->with(['color', 'pattern', 'brand', 'texture', 'size', 'category'])
            ->paginate(40);

        return view('pages.goods-sale', compact(
            'goods',
            'colors',
            'categories',
            'patterns',
            'textures',
            'sizes',
            'brands',
            'title'
        ));
    }
}
