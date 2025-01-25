<?php

namespace App\Http\Controllers;

use App\Exports\GoodsEditorExport;
use App\Exports\PricesEditorExport;
use App\Imports\GoodsEditorImport;
use App\Imports\PricesEditorImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class EditorGoodsController extends Controller
{
    public function index()
    {
        return view('pages.admin.editor');
    }

    public function importGoods(Request $request)
    {
        Excel::import(new GoodsEditorImport, $request->file('fileExcel'));
        return redirect()->back()->with('status', 'editorGoods-loaded');
    }

    public function importPrices(Request $request)
    {
        Excel::import(new PricesEditorImport, $request->file('fileExcel'));
        return redirect()->back()->with('status', 'editorPrices-loaded');
    }

    public function exportGoods()
    {
        return Excel::download(new GoodsEditorExport, 'editorGoods-AC.xlsx');
    }

    public function exportPrices()
    {
        return Excel::download(new PricesEditorExport, 'editorPrices-AC.xlsx');
    }
}
