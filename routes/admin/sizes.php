<?php

use App\Http\Controllers\SizesController;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => '/admin/sizes',
    // 'middleware' => 'auth',
], function () {
    Route::get('/list', [SizesController::class, 'index'])->name('sizes.list');
    Route::post('/create', [SizesController::class, 'store'])->name('sizes.store');
    Route::patch('/', [SizesController::class, 'update'])->name('sizes.update');
    Route::delete('/', [SizesController::class, 'destroy'])->name('sizes.destroy');
});
