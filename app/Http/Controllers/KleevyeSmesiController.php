<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class KleevyeSmesiController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'sku' => ['required', 'alpha_num', 'unique:products,sku', 'max:8'],
            'title' => ['required', 'string', 'max:255'],
            'price' => ['nullable', 'numeric', 'between:0.00,99999999.99'],
            'unit' => ['required', 'string'],
            'description' => ['nullable', 'string', 'regex:/^[\s\S]*(<p>|<br\s*\/?>|<ul>|<li>)*[\s\S]*$/i'],
            'category_id' => ['nullable', 'numeric'],
            'color_id' => ['nullable', 'numeric'],
            'brand_id' => ['nullable', 'numeric'],
            'country_id' => ['nullable', 'numeric'],
            'weight_kg' => ['nullable', 'numeric', 'between:0.00,99999999.99'],
            'imgs' => ['nullable', 'array'],
            'imgs.*' => [
                'nullable',
                'image',
                'mimes:jpeg,png,jpg,webp',
                'dimensions:max_width=1200,max_height=1200',
                'max:50000',
            ]
        ]);

        $productData = [
            'sku' => $validated['sku'],
            'title' => $validated['title'],
            'price' => $validated['price'],
            'unit' => $validated['unit'],
            'description' => $validated['description'],
            'slug' => Str::slug($validated['title']),
            'category_id' => $validated['category_id'],
            'color_id' => $validated['color_id'],
            'brand_id' => $validated['brand_id'],
            'country_id' => $validated['country_id'],
            'attributes' => [],
        ];

        if (isset($validated['weight_kg'])) {
            $productData['attributes']['weight_kg'] = $validated['weight_kg'];
        }

        $product = Product::create($productData);

        if ($request->hasFile('imgs')) {
            foreach ($request->file('imgs') as $index => $img) {
                if ($index >= 5) break;
                $filename = $product->sku . '_' . $index . '.' . $img->getClientOriginalExtension();
                $img->storeAs('public/images', $filename);
                $product->images()->create(['title' => $filename, 'order' => $index]);
            }
        }

        return back()->with('status', 'product-created');
    }
}
