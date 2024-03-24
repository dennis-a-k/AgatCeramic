<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ProductsExport implements WithMultipleSheets
{
    /**
     * @return array
     */
    public function sheets(): array
    {
        return [
            'Товары' => new GoodsExport,
            'Сharacteristics' => new СharacteristicsExport,
        ];
    }

    public function registerEvents(): array
    {
        $spreadsheet = new Spreadsheet();
        $spreadsheet->getActiveSheet('Сharacteristics')->setSheetState(Worksheet::SHEETSTATE_VERYHIDDEN);
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $spreadsheet = new Spreadsheet();
                $event->sheet->getActiveSheet('\'Сharacteristics\'')->setSheetState(Worksheet::SHEETSTATE_VERYHIDDEN);
            }
        ];
    }
}
