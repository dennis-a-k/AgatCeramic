<?php

use App\Http\Controllers\GoodsController;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => '/admin-panel',
    // 'middleware' => 'auth',
], function () {
    Route::get('/goods', [GoodsController::class, 'index'])->name('goods.list');
    // Route::get('/create', [GoodsController::class, 'create'])->name('product.create');
    // Route::post('/create', [GoodsController::class, 'store'])->name('product.store');
    // Route::get('/{id}', [GoodsController::class, 'show'])->name('product.show');
    // Route::get('/{id}/edit', [GoodsController::class, 'edit'])->name('product.edit');
    // Route::patch('/{id}', [GoodsController::class, 'update'])->name('product.update');
    // Route::patch('/{id}/update_published', [GoodsController::class, 'updatePublished'])->name('product.update.published');
    // Route::patch('/{id}/update_price', [GoodsController::class, 'updatePrice'])->name('product.update.price');
    // Route::patch('/{id}/update_count', [GoodsController::class, 'updateCount'])->name('product.update.count');
    // Route::delete('/', [GoodsController::class, 'destroy'])->name('product.destroy');
});
