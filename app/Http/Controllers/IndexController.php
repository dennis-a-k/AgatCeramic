<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;

class IndexController extends Controller
{
    public function index()
    {
        $brands = Brand::whereNotNull('img')
            ->where('img', '!=', '')
            ->get();

        $categoryIds = Category::whereIn('title', [config('categories.keramogranit'), config('categories.plitka'), config('categories.mozaika')])
            ->pluck('id', 'title')
            ->toArray();

        $keramogranit = Product::where('category_id', $categoryIds[config('categories.keramogranit')])->inRandomOrder()->limit(8)->get();
        $plitka = Product::where('category_id', $categoryIds[config('categories.plitka')])->inRandomOrder()->limit(8)->get();
        $mozaika = Product::where('category_id', $categoryIds[config('categories.mozaika')])->inRandomOrder()->limit(8)->get();

        $products = [
            'keramogranit' => $keramogranit,
            'plitka' => $plitka,
            'mozaika' => $mozaika,
        ];

        return view('index', compact('brands', 'products'));
    }
}
