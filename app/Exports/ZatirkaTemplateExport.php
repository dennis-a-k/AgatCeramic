<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class ZatirkaTemplateExport implements WithMultipleSheets
{
    /**
     * @return array
     */
    public function sheets(): array
    {
        return [
            'Товары' => new PageForZatirka,
            'Сharacteristics' => new PageZatirkaСharacteristics,
        ];
    }
}
