<?php

namespace App\Services;

use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

class CartService
{
    const CART_KEY = 'shopping_cart';
    const CART_EXPIRY_DAYS = 7;

    public function addToCart($product, $quantity)
    {
        $cart = Session::get(self::CART_KEY, []);

        $cartItem = [
            'id' => $product->id,
            'sku' => $product->sku,
            'title' => $product->title,
            'price' => $product->price,
            'quantity' => $quantity,
            'unit' => $product->unit,
            'image' => $product->images,
            'expires_at' => Carbon::now()->addDays(self::CART_EXPIRY_DAYS),
            'category_slug' => $product->category->slug,
            'collection_slug' => $product->collection->slug,
            'slug' => $product->slug,
        ];

        if (isset($cart[$product->id])) {
            $cart[$product->id]['quantity'] += $quantity;
        } else {
            $cart[$product->id] = $cartItem;
        }

        Session::put(self::CART_KEY, $cart);
    }

    public function updateQuantity($productId, $quantity)
    {
        $cart = Session::get(self::CART_KEY, []);

        if (isset($cart[$productId])) {
            $cart[$productId]['quantity'] = $quantity;
            Session::put(self::CART_KEY, $cart);
        }
    }

    public function removeItem($productId)
    {
        $cart = Session::get(self::CART_KEY, []);

        if (isset($cart[$productId])) {
            unset($cart[$productId]);
            Session::put(self::CART_KEY, $cart);
        }
    }

    public function getCart()
    {
        $cart = Session::get(self::CART_KEY, []);

        // Удаляем просроченные товары
        foreach ($cart as $productId => $item) {
            if (Carbon::parse($item['expires_at'])->isPast()) {
                unset($cart[$productId]);
            }
        }

        Session::put(self::CART_KEY, $cart);
        return $cart;
    }

    public function getTotal()
    {
        $cart = $this->getCart();
        return array_reduce($cart, function ($carry, $item) {
            return $carry + ($item['price'] * $item['quantity']);
        }, 0);
    }

    public function clear()
    {
        Session::forget(self::CART_KEY);
    }
}
