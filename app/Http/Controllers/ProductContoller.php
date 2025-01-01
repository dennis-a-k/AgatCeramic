<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ProductContoller extends Controller
{
    public function show(string $sku)
    {
        $product = Product::where('sku', $sku)->firstOrFail();
        return view('pages.product', compact('product'));
    }

    public function modal($id)
    {
        $product = Product::findOrFail($id);

        if (!$product) {
            return response()->json(['error' => 'Product not found'], 404);
        }

        return response()->json([
            'title' => $product->title,
            'price' => $product->price,
            'sku' => $product->sku,
            'unit' => $product->unit,
            'collection' => $product->collection,
            'brand' => $product->brand,
            'description' => $product->description,
            'images' => $product->images,
        ]);
    }
}
