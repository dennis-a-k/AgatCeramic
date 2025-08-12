<?php

namespace App\Imports;

use App\Models\Product;
use App\Models\Image;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ImagesImport implements ToCollection, WithHeadingRow
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            // dd($rows);
            if (!isset($row['artikul']) || !isset($row['nomer_kartinki']) || !isset($row['ssylka'])) {
                continue;
            }

            $sku = $row['artikul'];
            $imageIndex = $row['nomer_kartinki'];
            $source = $row['ssylka'];

            $product = Product::where('sku', $sku)->first();
            if (!$product) {
                continue;
            }

            $allowedExtensions = ['jpg', 'jpeg', 'png', 'webp'];
            $extension = pathinfo($source, PATHINFO_EXTENSION);

            if (!$extension || !in_array(strtolower($extension), $allowedExtensions)) {
                Log::error("Invalid image extension: {$source}", ['sku' => $sku]);
                continue;
            }

            $filename = $sku . '_' . $imageIndex . '.' . $extension;
            $imagePath = 'public/images/' . $filename;

            try {
                // Проверяем тип источника (URL или локальный путь)
                if (filter_var($source, FILTER_VALIDATE_URL)) {
                    // Обработка URL
                    $response = Http::withoutVerifying()->get($source);

                    if ($response->successful()) {
                        Storage::put($imagePath, $response->body());
                    } else {
                        Log::error("Failed to download image: {$source}", [
                            'status' => $response->status(),
                            'sku' => $sku
                        ]);
                        continue;
                    }
                } else {
                    // Обработка локального пути (абсолютного или относительного)
                    if (file_exists($source)) {
                        // Абсолютный путь
                        $localPath = $source;
                    } else {
                        // Относительный путь внутри проекта
                        $localPath = base_path($source);

                        if (!file_exists($localPath)) {
                            Log::error("Local file not found: {$source}", ['sku' => $sku]);
                            continue;
                        }
                    }

                    Storage::put($imagePath, file_get_contents($localPath));
                }

                // Создаем запись в базе данных
                Image::updateOrCreate(
                    ['title' => $filename],
                    [
                        'product_id' => $product->id,
                        'order' => $imageIndex
                    ]
                );

            } catch (\Exception $e) {
                Log::error("Error processing image: {$source}", [
                    'error' => $e->getMessage(),
                    'sku' => $sku
                ]);
            }
        }
    }
}
