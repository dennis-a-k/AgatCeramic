<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');

        if (!$query) {
            return redirect()->back();
        }

        $goods = Product::query()
            ->where('is_published', true)
            ->where(function($q) use ($query) {
                $q->where('title', 'LIKE', "%{$query}%")
                    ->orWhere('sku', 'LIKE', "%{$query}%")
                    ->orWhere('product_code', 'LIKE', "%{$query}%");
            })
            ->with(['category', 'images'])
            ->paginate(16);

        return view('pages.search-results', [
            'goods' => $goods,
            'query' => $query,
            'title' => "Результаты поиска: {$query}"
        ]);
    }
}
