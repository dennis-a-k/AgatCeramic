<?php

namespace App\Http\Controllers;

use App\Exports\CeramicTemplateExport;
use App\Exports\GoodsExport;
use App\Exports\KleyaTemplateExport;
use App\Exports\PlumbingTemplateExport;
use App\Exports\ZatirkaTemplateExport;
use App\Imports\ProductsImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExcelController extends Controller
{
    public function import(Request $request)
    {
        Excel::import(new ProductsImport, $request->file('fileExcel'));
        return redirect()->back()->with('status', 'template-loaded');
    }

    public function export()
    {
        return Excel::download(new GoodsExport, 'goods-AC.xlsx');
    }

    public function ceramicTemplateExport()
    {
        return Excel::download(new CeramicTemplateExport, 'ceramic-template-AC.xlsx');
    }

    public function kleyaTemplateExport()
    {
        return Excel::download(new KleyaTemplateExport, 'kleya-template-AC.xlsx');
    }

    public function zatirkaTemplateExport()
    {
        return Excel::download(new ZatirkaTemplateExport, 'zatirka-template-AC.xlsx');
    }

    public function plumbingTemplateExport()
    {
        return Excel::download(new PlumbingTemplateExport, 'plumbing-template-AC.xlsx');
    }
}
