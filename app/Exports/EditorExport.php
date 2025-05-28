<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class EditorExport implements WithMultipleSheets
{
    private $parametr;

    public function __construct($parametr)
    {
        $this->parametr = $parametr;
    }

    /**
     * @return array
     */
    public function sheets(): array
    {
        if ($this->parametr === 'goods') {
            return [
                'Товары' => new PageEditorGoods,
                'Сharacteristics' => new PageCeramicСharacteristics,
            ];
        }
        return [
            'Товары' => new PageEditor($this->parametr),
            'Сharacteristics' => new PageEditorСharacteristics($this->parametr),
        ];
    }
}
