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
}
