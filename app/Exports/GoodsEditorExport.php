<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class GoodsEditorExport implements WithMultipleSheets
{
    /**
     * @return array
     */
    public function sheets(): array
    {
        return [
            'Товары' => new PageEditorGoods,
            'Сharacteristics' => new PageСharacteristics,
        ];
    }
}
