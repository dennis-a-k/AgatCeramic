<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class CeramicTemplateExport implements WithMultipleSheets
{
    /**
     * @return array
     */
    public function sheets(): array
    {
        return [
            'Товары' => new PageForCeramic,
            'Сharacteristics' => new PageCeramicСharacteristics,
        ];
    }
}
