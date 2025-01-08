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

    protected function customerName(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => Crypt::decryptString($value),
            set: function ($value) {
                $this->searchable_name = strtolower($value);
                return Crypt::encryptString($value);
            }
        );
    }

    protected function customerEmail(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => Crypt::decryptString($value),
            set: function ($value) {
                $this->searchable_email = strtolower($value);
                return Crypt::encryptString($value);
            }
        );
    }

    protected function customerPhone(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => Crypt::decryptString($value),
            set: function ($value) {
                $this->searchable_phone = preg_replace('/[^0-9]/', '', $value);
                return Crypt::encryptString($value);
            }
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
        return $query->where('searchable_email', strtolower($email));
    }

    public function scopeSearchByPhone($query, $phone)
    {
        return $query->where('searchable_phone', preg_replace('/[^0-9]/', '', $phone));
    }

    public function scopeSearchByName($query, $name)
    {
        return $query->where('searchable_name', 'LIKE', '%' . strtolower($name) . '%');
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}
