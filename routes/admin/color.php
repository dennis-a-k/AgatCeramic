<?php

use App\Http\Controllers\ColorController;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => '/admin-panel/colors',
    // 'middleware' => 'auth',
], function () {
    Route::get('/', [ColorController::class, 'index'])->name('color.list');
    Route::post('/create', [ColorController::class, 'store'])->name('color.store');
    Route::patch('/', [ColorController::class, 'update'])->name('color.update');
    Route::delete('/', [ColorController::class, 'destroy'])->name('color.destroy');
});
