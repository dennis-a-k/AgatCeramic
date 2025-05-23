<?php

namespace App\Exports;

use App\Models\Product;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;

class PageGoods implements WithEvents, WithTitle, FromView
{
    public function view(): View
    {
        return view('components.admin.excel.goods', [
            'goods' => Product::query()->orderBy('created_at', 'DESC')->get(),
        ]);
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

                $sheet->getDelegate()->getStyle('A1:D1')->applyFromArray($styleText);
                $sheet->getDelegate()->getStyle('E1:AA1')->applyFromArray($styleHead);
            }
        ];
    }
}
