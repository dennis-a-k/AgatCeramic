<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;

class KeramogranitController extends Controller
{
    public function index()
    {
        $category = Category::where('title', 'Керамогранит')->first();
        if ($category) {
            $goods = Product::where('category_id', $category->id)
                ->orderBy('created_at', 'DESC')
                ->get();
        } else {
            $goods = collect(); // Пустая коллекция, если категория не найдена
        }
        return view('pages.goods', ['title' => 'Керамогранит', 'goods' => $goods, 'url' => 'keramogranit']);
    }

    public function show()
    {
        return view('pages.product');
    }
}
