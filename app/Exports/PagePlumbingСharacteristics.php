<?php

namespace App\Exports;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Collection;
use App\Models\Color;
use App\Models\Country;
use App\Models\Pattern;
use App\Models\Size;
use App\Models\Texture;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class PagePlumbingСharacteristics implements FromView, WithTitle, WithEvents
{
    public function view(): View
    {
        $includedCategories = [
            config('categories.santexnika'),
        ];

        return view('components.admin.excel.characteristics', [
            'categories' => Category::with('children.children')->whereIn('title', $includedCategories)->firstOrFail(),
            'sizes' => Size::all('title'),
            'colors' => Color::all('title'),
            'patterns' => Pattern::all('title'),
            'textures' => Texture::all('title'),
            'brands' => Brand::all('title'),
            'collections' => Collection::all('title'),
            'countries' => Country::all('name'),
        ]);
    }

    public function title(): string
    {
        return 'Сharacteristics';
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $event->sheet->setSheetState(Worksheet::SHEETSTATE_HIDDEN);
            }
        ];
    }
}
