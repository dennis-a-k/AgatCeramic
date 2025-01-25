<?php

namespace App\Http\Controllers;

use App\Imports\GoodsEditorImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class EditorGoodsController extends Controller
{
    public function index()
    {
        return view('pages.admin.editor');
    }

    public function import(Request $request)
    {
        Excel::import(new GoodsEditorImport, $request->file('fileExcel'));
        return redirect()->back()->with('status', 'template-loaded');
    }
}
