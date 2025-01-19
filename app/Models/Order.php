<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_number',
        'customer_name',
        'customer_email',
        'customer_phone',
        'shipping_address',
        'comment',
        'total_amount',
        'status',
        'searchable_email',
        'searchable_phone',
        'searchable_name'
    ];

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($order) {
            if ($order->isDirty('customer_name')) {
                $order->searchable_name = hash('sha256', strtolower($order->customer_name));
            }
            if ($order->isDirty('customer_email')) {
                $order->searchable_email = hash('sha256', strtolower($order->customer_email));
            }
            if ($order->isDirty('customer_phone')) {
                $phone = preg_replace('/[^0-9]/', '', $order->customer_phone);
                $order->searchable_phone = hash('sha256', $phone);
            }
        });
    }

    protected function customerName(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => Crypt::decryptString($value),
            set: fn ($value) => Crypt::encryptString($value)
        );
    }

    protected function customerEmail(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => Crypt::decryptString($value),
            set: fn ($value) => Crypt::encryptString($value)
        );
    }

    protected function customerPhone(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => Crypt::decryptString($value),
            set: fn ($value) => Crypt::encryptString($value)
        );
    }

    protected function shippingAddress(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => Crypt::decryptString($value),
            set: fn ($value) => Crypt::encryptString($value)
        );
    }

    public function scopeSearchByEmail($query, $email)
    {
        $hash = hash('sha256', strtolower($email));
        return $query->where('searchable_email', $hash);
    }

    public function scopeSearchByPhone($query, $phone)
    {
        $phone = preg_replace('/[^0-9]/', '', $phone);
        $hash = hash('sha256', $phone);
        return $query->where('searchable_phone', $hash);
    }

    public function scopeSearchByName($query, $name)
    {
        $hash = hash('sha256', strtolower($name));
        return $query->where('searchable_name', $hash);
    }
}
