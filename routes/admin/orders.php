<?php

use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => '/admin-panel',
    // 'middleware' => 'auth',
], function () {
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.list');
    Route::get('/order/{order_number}', [OrderController::class, 'order'])->name('order.show');
    Route::get('/order-print/{order_number}', [OrderController::class, 'print'])->name('order.print');
    // Route::get('/product-create', [GoodsController::class, 'create'])->name('product.create');
    // Route::post('/product-create', [GoodsController::class, 'store'])->name('product.store');
    Route::get('/order/{id}/edit', [OrderController::class, 'edit'])->name('order.edit');
    // Route::patch('/product/{id}', [GoodsController::class, 'update'])->name('product.update');
    // Route::patch('/product/{id}/update-published', [GoodsController::class, 'updatePublished'])->name('product.update.published');
    // Route::patch('/product/{id}/update-sale', [GoodsController::class, 'updateSale'])->name('product.update.sale');
    // Route::patch('/product/{id}/update-price', [GoodsController::class, 'updatePrice'])->name('product.update.price');
    // Route::delete('/product', [GoodsController::class, 'destroy'])->name('product.destroy');

    // Route::delete('/images/{image}', [GoodsController::class, 'deleteImage'])->name('images.destroy');

    // Route::post('/goods-import', [GoodsController::class, 'import'])->name('goods.import');
    // Route::get('/goods-export', [GoodsController::class, 'export'])->name('goods.export');
});
