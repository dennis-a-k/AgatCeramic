<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;

class MozaikaController extends Controller
{
    public function index()
    {
        $category = Category::where('title', 'Мозаика')->first();
        if ($category) {
            $goods = Product::where('category_id', $category->id)
                ->where('is_published', true)
                ->orderBy('created_at', 'DESC')
                ->get();
        } else {
            $goods = collect(); // Пустая коллекция, если категория не найдена
        }
        return view('pages.goods', ['title' => 'Мозаика', 'goods' => $goods, 'url' => 'mozaika']);
    }
}
