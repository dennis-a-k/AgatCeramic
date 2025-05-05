<?php

use App\Http\Controllers\GoodsController;
use App\Http\Controllers\KleevyeSmesiController;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => '/admin-panel',
    'middleware' => ['auth', 'verified'],
], function () {
    Route::post('/kleya-create', [KleevyeSmesiController::class, 'store'])->name('kleya.store');
    Route::get('/kleya/{id}/edit', [KleevyeSmesiController::class, 'edit'])->name('kleya.edit');
    Route::patch('/kleya/{id}', [KleevyeSmesiController::class, 'update'])->name('kleya.update');

    Route::get('/goods', [GoodsController::class, 'index'])->name('goods.list');
    Route::get('/product-create', [GoodsController::class, 'create'])->name('product.create');
    Route::post('/product-create', [GoodsController::class, 'store'])->name('product.store');
    Route::get('/product/{id}/edit', [GoodsController::class, 'edit'])->name('product.edit');
    Route::patch('/product/{id}', [GoodsController::class, 'update'])->name('product.update');
    Route::patch('/product/{id}/update-published', [GoodsController::class, 'updatePublished'])->name('product.update.published');
    Route::patch('/product/{id}/update-sale', [GoodsController::class, 'updateSale'])->name('product.update.sale');
    Route::patch('/product/{id}/update-price', [GoodsController::class, 'updatePrice'])->name('product.update.price');
    Route::delete('/product', [GoodsController::class, 'destroy'])->name('product.destroy');

    Route::delete('/images/{image}', [GoodsController::class, 'deleteImage'])->name('images.destroy');

    Route::post('/goods-import', [GoodsController::class, 'import'])->name('goods.import');
    Route::get('/goods-export', [GoodsController::class, 'export'])->name('goods.export');
    Route::get('/goods-template-export', [GoodsController::class, 'templateExport'])->name('goods.template.export');
});
