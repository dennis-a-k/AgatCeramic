<?php

namespace App\Http\Controllers;

use App\Exports\ProductsExport;
use App\Imports\ProductsImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class GoodsController extends Controller
{
    public function import(Request $request)
    {
        Excel::import(new ProductsImport, $request->file('files'));
        return redirect()->back();
    }

    public function export(Request $request)
    {
        return Excel::download(new ProductsExport, 'goods.xlsx');
    }
}
