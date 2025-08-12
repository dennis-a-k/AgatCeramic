<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use ZipArchive;

class ZipController extends Controller
{
    public function importZip(Request $request)
    {
        $request->validate([
            'zipFile' => 'required|mimes:zip'
        ]);

        $zipFile = $request->file('zipFile');
        $zipPath = $zipFile->store('temp', 'local');
        $fullZipPath = storage_path("app/{$zipPath}");

        $processed = 0;
        $zip = new ZipArchive;
        $res = $zip->open($fullZipPath);
        if ($res === TRUE) {
            for ($i = 0; $i < $zip->numFiles; $i++) {
                $filename = $zip->getNameIndex($i);

                // Пропускаем директории
                if (substr($filename, -1) === '/') continue;

                $fileinfo = pathinfo($filename);

                // Проверяем формат имени файла: артикул_номер.расширение
                if (preg_match('/^([^_]+)_(\d+)$/', $fileinfo['filename'], $matches)) {
                    $sku = $matches[1];
                    $imageIndex = $matches[2];
                    $extension = isset($fileinfo['extension']) ? strtolower($fileinfo['extension']) : 'jpg';
                    $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif', 'webp'];

                    if (!in_array($extension, $allowedExtensions)) {
                        continue; // Пропускаем недопустимые форматы
                    }

                    $newFilename = "{$sku}_{$imageIndex}.{$extension}";

                    $product = Product::where('sku', $sku)->first();
                    if ($product) {
                        // Получаем содержимое файла
                        $fileContent = $zip->getFromIndex($i);

                        if ($fileContent === false) {
                            Log::error("Не удалось извлечь файл: {$filename}");
                            continue;
                        }

                        // Сохраняем в постоянное хранилище
                        $path = "public/images/{$newFilename}";
                        if (!Storage::put($path, $fileContent)) {
                            Log::error("Ошибка сохранения файла: {$newFilename}");
                        }

                        // Создаем запись в базе данных
                        Image::updateOrCreate(
                            ['title' => $newFilename],
                            [
                                'product_id' => $product->id,
                                'order' => $imageIndex
                            ]
                        );

                        $processed++;
                    }
                }
            }
            $zip->close();
        } else {
            // Ошибка открытия архива
            return redirect()->back()->with('error', 'Ошибка открытия ZIP-архива: ' . $res);
        }

        Storage::delete($zipPath); // Удаляем временный ZIP-архив

        return redirect()->back()->with([
            'status' => 'images-imported',
            'processed' => $processed
        ]);
    }
}
