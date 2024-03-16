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
        'product_code',
        'category_id',
        'size_id',
        'color_id',
        'pattern_id',
        'texture_id',
        'brand_id',
        'collection_id',
        'country_id',
        'image_id',
        'description',
    ];
}
