<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'img',
    ];

    public function goods()
    {
        return $this->hasMany(Product::class);
    }
}
