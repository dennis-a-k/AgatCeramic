<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Cell\DataValidation;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;

class PageEditor implements WithEvents, WithTitle, FromView
{
    private $parametr;

    public function __construct($parametr)
    {
        $this->parametr = $parametr;
    }

    private function listСharacteristics($getData, $insertData, $sheet)
    {
        for ($i = 2; $i < 1002; $i++) {
            $sheet->setCellValue($insertData . $i, '');
            $objValidation = $sheet->getCell($insertData . $i)->getDataValidation();
            $objValidation->setType(DataValidation::TYPE_LIST);
            $objValidation->setErrorStyle(DataValidation::STYLE_INFORMATION);
            $objValidation->setAllowBlank(false);
            $objValidation->setShowInputMessage(true);
            $objValidation->setShowErrorMessage(true);
            $objValidation->setShowDropDown(true);
            $objValidation->setFormula1('\'Сharacteristics\'' . $getData);
        }
    }

    public function view(): View
    {
        if ($this->parametr === 'status') {
            return view('components.excel.editor', ['item' => 'Статус']);
        }

        if ($this->parametr === 'sale') {
            return view('components.excel.editor', ['item' => 'Распродажа']);
        }

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

                if ($this->parametr === 'status' || $this->parametr === 'sale') {
                    $this->listСharacteristics('!$A:$A', 'B', $sheet);
                }

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
