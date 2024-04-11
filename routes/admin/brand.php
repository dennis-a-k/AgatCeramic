<?php

use App\Http\Controllers\BrandController;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => '/admin-panel/brands',
    // 'middleware' => 'auth',
], function () {
    Route::get('/', [BrandController::class, 'index'])->name('brand.list');
    Route::post('/create', [BrandController::class, 'store'])->name('brand.store');
    Route::patch('/', [BrandController::class, 'update'])->name('brand.update');
    Route::delete('/', [BrandController::class, 'destroy'])->name('brand.destroy');
});
