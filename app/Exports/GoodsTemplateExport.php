<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class GoodsTemplateExport implements WithMultipleSheets
{
    /**
     * @return array
     */
    public function sheets(): array
    {
        return [
            'Товары' => new PageForGoods,
            'Сharacteristics' => new PageСharacteristics,
        ];
    }
}
