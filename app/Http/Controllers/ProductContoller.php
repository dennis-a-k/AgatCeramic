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
}
