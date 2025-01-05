<?php

namespace App\Http\Controllers;

use App\Services\CartService;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    protected $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    public function add(Request $request)
    {
        $product = Product::findOrFail($request->product_id);
        $this->cartService->addToCart($product, $request->quantity);

        return response()->json([
            'message' => 'Товар добавлен в корзину',
            'cart_count' => count($this->cartService->getCart())
        ]);
    }

    public function update(Request $request)
    {
        $this->cartService->updateQuantity($request->product_id, $request->quantity);
        return response()->json([
            'message' => 'Количество обновлено',
            'total' => $this->cartService->getTotal()
        ]);
    }

    public function remove(Request $request)
    {
        $this->cartService->removeItem($request->product_id);
        return response()->json([
            'message' => 'Товар удален из корзины',
            'total' => $this->cartService->getTotal(),
            'cart_count' => count($this->cartService->getCart())
        ]);
    }

    public function index()
    {
        $cart = $this->cartService->getCart();
        $total = $this->cartService->getTotal(); // получаем общую сумму
        return view('pages.cart', compact('cart', 'total')); // передаем total вместо cartService
    }

    public function getOffcanvasCart()
    {
        $cart = $this->cartService->getCart();
        $total = $this->cartService->getTotal();

        if (request()->ajax()) {
            return view('components.cart.offcanvas-cart', compact('cart', 'total'))->render();
        }

        return response()->json(['error' => 'Invalid request'], 400);
    }
}
