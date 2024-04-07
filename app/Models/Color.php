<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'code',
    ];

    public function goods()
    {
        return $this->hasMany(Product::class);
    }
}
