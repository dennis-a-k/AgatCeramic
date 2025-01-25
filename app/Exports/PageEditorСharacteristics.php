<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class PageEditorСharacteristics implements FromView, WithTitle, WithEvents
{
    private $parametr;

    public function __construct($parametr)
    {
        $this->parametr = $parametr;
    }

    public function view(): View
    {
        if ($this->parametr === 'status') {
            return view('components.excel.editor-characteristics', [
                'items' => ['Опубликован', 'Скрыт'],
            ]);
        }

        if ($this->parametr === 'sale') {
            return view('components.excel.editor-characteristics', [
                'items' => ['Распродажа', 'Не распродажа'],
            ]);
        }

        return view('components.excel.editor-characteristics', [
            'items' => [],
        ]);
    }

    public function title(): string
    {
        return 'Сharacteristics';
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $event->sheet->setSheetState(Worksheet::SHEETSTATE_HIDDEN);
            }
        ];
    }
}
