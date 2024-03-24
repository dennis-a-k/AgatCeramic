<?php

namespace App\Exports;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Collection;
use App\Models\Color;
use App\Models\Country;
use App\Models\Pattern;
use App\Models\Size;
use App\Models\Texture;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

class СharacteristicsExport implements FromView, WithTitle
{
    public function view(): View
    {
        return view('components.excel.exports', [
            'categories' => Category::all('title'),
            'sizes' => Size::all('title'),
            'colors' => Color::all('title'),
            'patterns' => Pattern::all('title'),
            'textures' => Texture::all('title'),
            'brands' => Brand::all('title'),
            'collections' => Collection::all('title'),
            'countries' => Country::all('name'),
        ]);
    }

    public function title(): string
    {
        return 'Сharacteristics';
    }

    public function registerEvents(): array
    {
        $spreadsheet = new Spreadsheet();
        $spreadsheet->getActiveSheet()->setSheetState(Worksheet::SHEETSTATE_VERYHIDDEN);

        return [
            AfterSheet::class => function (AfterSheet $event) {

                $spreadsheet = new Spreadsheet();
                $spreadsheet->getActiveSheet()->setSheetState(Worksheet::SHEETSTATE_VERYHIDDEN);

                $event->sheet->setSheetState(Worksheet::SHEETSTATE_VERYHIDDEN);
            }
        ];
    }
}
