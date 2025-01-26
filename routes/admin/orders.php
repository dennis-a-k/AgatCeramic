<?php

use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => '/admin-panel',
    'middleware' => ['auth', 'verified'],
], function () {
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.list');
    Route::get('/order/{order_number}', [OrderController::class, 'order'])->name('order.show');
    Route::get('/order-print/{order_number}', [OrderController::class, 'print'])->name('order.print');
    Route::get('/order-pdf/{id}', [OrderController::class, 'exportToPDF'])->name('order.pdf');
});
