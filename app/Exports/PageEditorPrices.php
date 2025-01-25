<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;

class PageEditorPrices implements WithEvents, WithTitle, FromView
{
    public function view(): View
    {
        return view('components.excel.editor', ['item' => 'Цена']);
    }

    public function title(): string
    {
        return 'Товары';
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                /** @var Sheet $sheet */
                $sheet = $event->sheet;

                $styleHead = [
                    'font' => [
                        'name' => 'Calibri',
                        'size' => 12,
                        'bold' => true,
                        'strikethrough' => false,
                        'color' => [
                            'rgb' => '1F3765'
                        ]
                    ],
                    'alignment' => [
                        'horizontal' => Alignment::HORIZONTAL_CENTER,
                        'vertical' => Alignment::VERTICAL_CENTER,
                        'wrapText' => true,
                    ],
                ];
                $styleText = [
                    'font' => [
                        'name' => 'Calibri',
                        'size' => 12,
                        'strikethrough' => false,
                        'color' => [
                            'rgb' => 'FFFFFF'
                        ]
                    ],
                    'alignment' => [
                        'horizontal' => Alignment::HORIZONTAL_CENTER,
                        'vertical' => Alignment::VERTICAL_CENTER,
                        'wrapText' => true,
                    ],
                ];
                $styleBorders = [
                    'borders' => [
                        'vertical' => [
                            'borderStyle' => Border::BORDER_THIN,
                            'color' => [
                                'rgb' => '8EAADB'
                            ]
                        ],
                    ],
                ];

                $sheet->getDelegate()->getStyle('A1')->applyFromArray($styleText);
                $sheet->getDelegate()->getStyle('B1')->applyFromArray($styleHead);
                $sheet->getDelegate()->getStyle('A2:C1002')->applyFromArray($styleBorders);
            }
        ];
    }
}
