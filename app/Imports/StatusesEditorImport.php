<?php

namespace App\Imports;

use App\Models\Product;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\WithValidation;

class StatusesEditorImport implements ToCollection, WithHeadingRow, WithValidation, SkipsEmptyRows, WithMultipleSheets
{
    use Importable;

    public function sheets(): array
    {
        return [
            0 => $this,
        ];
    }

    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            if (isset($row['artikul']) && $row['artikul'] != null) {
                $product = Product::where('sku', $row['artikul'])->first();

                if ($product) {
                    $product->update([
                        'is_published' => $row['status'] === 'Скрыт' ? false : true,
                    ]);
                }
            }
        }
    }

    public function rules(): array
    {
        return [
            'status' => ['required', 'string'],
        ];
    }
}
