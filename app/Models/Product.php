<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'sku',
        'title',
        'price',
        'unit',
        'product_code',
        'category_id',
        'size_id',
        'color_id',
        'pattern_id',
        'subcategory_id',
        'texture_id',
        'brand_id',
        'collection_id',
        'country_id',
        'description',
        'is_published',
        'sale',
        'slug',
        'attributes',
    ];

    protected $casts = [
        'attributes' => 'array',
    ];

    public static function generateSku($categoryId)
    {
        $lastProduct = self::orderBy('id', 'desc')->first();
        $lastId = $lastProduct ? $lastProduct->id : 0;
        return $categoryId . str_pad($lastId + 1, 4, '0', STR_PAD_LEFT);
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function subcategory()
    {
        return $this->belongsTo(Category::class, 'subcategory_id', 'id');
    }

    public function collection()
    {
        return $this->belongsTo(Collection::class, 'collection_id', 'id');
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id', 'id');
    }

    public function color()
    {
        return $this->belongsTo(Color::class, 'color_id', 'id');
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id', 'id');
    }

    public function pattern()
    {
        return $this->belongsTo(Pattern::class, 'pattern_id', 'id');
    }

    public function size()
    {
        return $this->belongsTo(Size::class, 'size_id', 'id');
    }

    public function texture()
    {
        return $this->belongsTo(Texture::class, 'texture_id', 'id');
    }

    public function images()
    {
        return $this->hasMany(Image::class)->orderBy('order');
    }
}
