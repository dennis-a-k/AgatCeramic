<?php

namespace App\Imports;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Collection as ModelsCollection;
use App\Models\Color;
use App\Models\Country;
use App\Models\Pattern;
use App\Models\Product;
use App\Models\Size;
use App\Models\Texture;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\WithValidation;
use Illuminate\Support\Str;

class GoodsEditorImport implements ToCollection, WithHeadingRow, WithValidation, SkipsEmptyRows, WithMultipleSheets
{
    use Importable;

    private $categories;
    private $sizes;
    private $colors;
    private $patterns;
    private $textures;
    private $brands;
    private $collections;
    private $countries;

    public function __construct()
    {
        $this->categories = Category::select('id', 'title')->get();
        $this->sizes = Size::select('id', 'title')->get();
        $this->colors = Color::select('id', 'title')->get();
        $this->patterns = Pattern::select('id', 'title')->get();
        $this->textures = Texture::select('id', 'title')->get();
        $this->brands = Brand::select('id', 'title')->get();
        $this->collections = ModelsCollection::select('id', 'title')->get();
        $this->countries = Country::select('id', 'name')->get();
    }

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
                    $category = $this->categories->where('title', $row['kategoriia'])->first();
                    $size = $this->sizes->where('title', $row['razmer'])->first();
                    $color = $this->colors->where('title', $row['cvet'])->first();
                    $pattern = $this->patterns->where('title', $row['uzor'])->first();
                    $texture = $this->textures->where('title', $row['poverxnost'])->first();
                    $brand = $this->brands->where('title', $row['proizvoditel'])->first();
                    $collection = $this->collections->where('title', $row['kollekciia'])->first();
                    $country = $this->countries->where('name', $row['strana'])->first();

                    $product->update([
                        'title' => $row['naimenovanie'],
                        'slug' => Str::slug($row['naimenovanie']),
                        'product_code' => $row['kod_tovara'] ?? NULL,
                        'description' => $row['opisanie'] ?? NULL,
                        'unit' => $row['edinica_izmereniia'] ?? 'м2',
                        'category_id' => $category->id ?? NULL,
                        'size_id' => $size->id ?? NULL,
                        'color_id' => $color->id ?? NULL,
                        'pattern_id' => $pattern->id ?? NULL,
                        'texture_id' => $texture->id ?? NULL,
                        'brand_id' => $brand->id ?? NULL,
                        'collection_id' => $collection->id ?? NULL,
                        'country_id' => $country->id ?? NULL,
                    ]);
                }
            }
        }
    }

    public function rules(): array
    {
        return [
            'artikul' => ['required', 'alpha_num', 'max:8'],
            'naimenovanie' => ['required', 'string', 'max:255'],
            'edinica_izmereniia' => ['nullable', 'string'],
            'kod_tovara' => ['nullable', 'string'],
            'opisanie' => ['nullable', 'string', 'regex:/^[\s\S]*(<p>|<br\s*\/?>|<ul>|<li>)*[\s\S]*$/i'],
            'kategoriia' => ['nullable', 'string'],
            'razmer' => ['nullable', 'string'],
            'cvet' => ['nullable', 'string'],
            'uzor' => ['nullable', 'string'],
            'poverxnost' => ['nullable', 'string'],
            'proizvoditel' => ['nullable', 'string'],
            'kollekciia' => ['nullable', 'string'],
            'strana' => ['nullable', 'string'],
        ];
    }
}
