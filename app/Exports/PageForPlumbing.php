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

class PageForPlumbing implements WithEvents, WithTitle, FromView
{
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
        return view('components.admin.excel.plumbing-template');
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

                $this->listСharacteristics('!$1:$1', 'A', $sheet);
                $this->listСharacteristics('!$3:$3', 'G', $sheet);
                $this->listСharacteristics('!$6:$6', 'H', $sheet);
                $this->listСharacteristics('!$8:$8', 'I', $sheet);
                $this->listСharacteristics('!$11:$11', 'E', $sheet);

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

                $sheet->getDelegate()->getStyle('A1:C1')->applyFromArray($styleText);
                $sheet->getDelegate()->getStyle('D1:M1')->applyFromArray($styleHead);
                $sheet->getDelegate()->getStyle('A2:J1002')->applyFromArray($styleBorders);
            }
        ];
    }
}
