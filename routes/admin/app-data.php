<?php

use App\Http\Controllers\AppDataController;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => '/admin-panel/app-data',
    'middleware' => ['auth', 'verified'],
], function () {
    Route::get('/', [AppDataController::class, 'index'])->name('app.data');
    // Route::post('/create', [BrandController::class, 'store'])->name('brands.store');
    // Route::patch('/', [BrandController::class, 'update'])->name('brands.update');
    // Route::delete('/', [BrandController::class, 'destroy'])->name('brands.destroy');
});
