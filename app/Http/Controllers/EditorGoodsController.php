<?php

namespace App\Http\Controllers;

use App\Exports\EditorExport;
use App\Exports\GoodsEditorExport;
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

    public function importStatuses(Request $request)
    {
        Excel::import(new StatusesEditorImport, $request->file('fileExcel'));
        return redirect()->back()->with('status', 'editorPrices-loaded');
    }

    public function export(Request $request)
    {
        return Excel::download(new EditorExport($request->parametr), 'editor-AC.xlsx');
    }
}
