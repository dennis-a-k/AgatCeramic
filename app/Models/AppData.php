<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppData extends Model
{
    use HasFactory;

    protected $fillable = [
        'app_phone',
        'app_email',
        'organization',
        'inn',
        'ogrn',
        'okato',
        'okpo',
        'bank',
        'bik',
        'k_s',
        'r_s',
        'adress',
    ];
}
