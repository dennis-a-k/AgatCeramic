<?php

namespace App\Http\Controllers;

use App\Exports\ProductsExport;
use App\Imports\ProductsImport;
use App\Models\Product;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class GoodsController extends Controller
{
    public function import(Request $request)
    {
        Excel::import(new ProductsImport, $request->file('files'));
        return redirect()->back();
    }

    public function export()
    {
        return Excel::download(new ProductsExport, 'goods-AC.xlsx');
    }

    public function index()
    {
        $goods = Product::query()->orderBy('sku', 'ASC')->get();
        return view('pages.admin.goods.goods', ['goods' => $goods]);
    }

    public function destroy(Request $request)
    {
        Product::find($request->id)->delete();
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

    public function updatePublished(Request $request, string $id)
    {
        $request->validate([
            'is_published' => ['required', 'string'],
        ]);
        Product::where('id', $id)->update(['is_published' => $request->is_published]);
        return back();
    }
}
