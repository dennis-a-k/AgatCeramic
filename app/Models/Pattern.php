<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pattern extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
    ];

    public function goods()
    {
        return $this->hasMany(Product::class);
    }
}
