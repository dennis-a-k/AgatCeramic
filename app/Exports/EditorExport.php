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
        if ($this->parametr === 'ceramics') {
            return [
                'Товары' => new PageEditorCeramic,
                'Сharacteristics' => new PageCeramicСharacteristics,
            ];
        }
        if ($this->parametr === 'kleya') {
            return [
                'Товары' => new PageEditorKleya,
                'Сharacteristics' => new PageKleyaСharacteristics,
            ];
        }
        if ($this->parametr === 'zatirka') {
            return [
                'Товары' => new PageEditorZatirka,
                'Сharacteristics' => new PageZatirkaСharacteristics,
            ];
        }
        if ($this->parametr === 'plumbing') {
            return [
                'Товары' => new PageEditorPlumbing,
                'Сharacteristics' => new PagePlumbingСharacteristics,
            ];
        }
        return [
            'Товары' => new PageEditor($this->parametr),
            'Сharacteristics' => new PageEditorСharacteristics($this->parametr),
        ];
    }
}
