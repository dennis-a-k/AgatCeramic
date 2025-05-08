<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function show($category, $slug, $sku)
    {
        $product = Product::query()->where('sku', $sku)
            ->whereHas('category', function ($query) use ($category) {
                $query->where('slug', $category);
            })
            ->where('slug', $slug)
            ->firstOrFail();

        $canonicalUrl = route('product.show', [
            'category' => $product->category->slug,
            'slug' => $product->slug,
            'sku' => $product->sku
        ]);

        if (request()->url() !== $canonicalUrl) {
            return redirect()->to($canonicalUrl, 301);
        }

        $description = Str::limit($product->description, 155);

        return view('pages.product', compact('product', 'description'));
    }

    public function modal($id)
    {
        $product = Product::with(['category', 'collection'])->findOrFail($id);

        return response()->json([
            'id' => $product->id,
            'title' => $product->title,
            'price' => $product->price,
            'sku' => $product->sku,
            'unit' => $product->unit,
            'collection' => $product->collection,
            'brand' => $product->brand,
            'category' => $product->category,
            'images' => $product->images,
            'url' => route('product.show', [
                'category' => $product->category->slug,
                'slug' => $product->slug,
                'sku' => $product->sku,
            ])
        ]);
    }
}
