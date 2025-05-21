<?php

namespace App\View\Composers\ViewComposers;

use App\Models\Brand;
use Illuminate\View\View;

class BrandComposer
{
    public function compose(View $view)
    {
        $includedCategories = [
            config('categories.keramogranit'),
            config('categories.plitka'),
            config('categories.mozaika'),
            config('categories.klinker'),
            config('categories.stupeni'),
        ];

        $brands = Brand::whereHas('goods', function ($query) use ($includedCategories) {
            $query->whereHas('category', function ($q) use ($includedCategories) {
                $q->whereIn('title', $includedCategories);
            });
        })->orderBy('title')->get();

        $groupedBrands = $brands->groupBy(function ($brand) {
            $firstChar = mb_strtoupper(mb_substr($brand->title, 0, 1));
            // Проверяем, является ли первый символ цифрой
            if (is_numeric($firstChar)) {
                return '0-9';
            }
            // Проверяем, является ли символ латинским
            if (preg_match('/^[A-Z]$/', $firstChar)) {
                return $firstChar;
            }
            // Все остальные символы (кириллица и прочие) группируем вместе
            return 'РУС';
        })->sortKeys();
        // Сортируем бренды внутри групп
        $groupedBrands = $groupedBrands->map(function ($brands) {
            return $brands->sortBy(fn($brand) => mb_strtolower($brand->title))
                ->map(function ($brand) {
                    // Делаем первую букву заглавной
                    $brand->title = mb_strtoupper(mb_substr($brand->title, 0, 1)) . mb_substr($brand->title, 1);
                    return $brand;
                })
                ->values();
        });
        $view->with([
            'groupedBrands' => $groupedBrands,
        ]);
    }
}
