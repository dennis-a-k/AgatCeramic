<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class PlumbingTemplateExport implements WithMultipleSheets
{
    /**
     * @return array
     */
    public function sheets(): array
    {
        return [
            'Товары' => new PageForPlumbing,
            'Сharacteristics' => new PagePlumbingСharacteristics,
        ];
    }
}
