<?php

namespace App\Imports;

use App\Models\Product;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProductsImport implements  ToCollection, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row)
        {
            if(isset($row['sku']) && $row['sku'] != null) {
                Product::firstOrCreate([
                    'sku' => $row['sku'],
                ],[
                    'sku' => $row['sku'],
                    'title' => $row['title'],
                    'price' => $row['price'],
                ]);
            }
        }
    }
}
