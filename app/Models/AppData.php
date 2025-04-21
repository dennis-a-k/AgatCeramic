<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
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

    protected function appPhoneFormatted(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->formatPhone($this->app_phone),
        );
    }

    private function formatPhone(?string $phone): ?string
    {
        if (!$phone) {
            return null;
        }

        if (preg_match('/^(\+7)(\d{3})(\d{3})(\d{2})(\d{2})$/', $phone, $matches)) {
            return "{$matches[1]} ({$matches[2]}) {$matches[3]}-{$matches[4]}-{$matches[5]}";
        }

        return $phone;
    }
}
