<?php

namespace App\Http\Controllers;

use App\Exports\EditorExport;
use App\Imports\GoodsEditorImport;
use App\Imports\PricesEditorImport;
use App\Imports\SalesEditorImport;
use App\Imports\StatusesEditorImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\File\Exception\FileException;

class EditorGoodsController extends Controller
{
    protected $importClasses = [
        'goods' => GoodsEditorImport::class,
        'prices' => PricesEditorImport::class,
        'statuses' => StatusesEditorImport::class,
        'sales' => SalesEditorImport::class,
    ];

    public function index()
    {
        return view('pages.admin.editor');
    }

    public function import(Request $request, string $type)
    {
        $this->validateFile($request);

        try {
            Excel::import(
                new ($this->importClasses[$type]),
                $request->file('fileExcel')
            );
            return redirect()->back()->with('status', "editor{$type}-loaded");
        } catch (FileException $e) {
            return redirect()->back()->with('error', 'Ошибка при импорте файла');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Неизвестная ошибка');
        }
    }

    public function export(Request $request)
    {
        return Excel::download(new EditorExport($request->parametr), 'editor-AC.xlsx');
    }

    private function validateFile(Request $request)
    {
        $request->validate([
            'fileExcel' => 'required|file|mimes:xlsx,xls'
        ]);
    }

    public function showUploadImagesForm()
    {
        return view('pages.admin.goods.upload-images');
    }
}
