<?php

use App\Http\Controllers\BrandController;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => '/admin-panel/brands',
    // 'middleware' => 'auth',
], function () {
    Route::get('/', [BrandController::class, 'index'])->name('brands.list');
    Route::post('/create', [BrandController::class, 'store'])->name('brands.store');
    Route::patch('/', [BrandController::class, 'update'])->name('brands.update');
    Route::delete('/', [BrandController::class, 'destroy'])->name('brands.destroy');
});
