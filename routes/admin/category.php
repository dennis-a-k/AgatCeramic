<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => '/admin-panel/categories',
    'middleware' => ['auth', 'verified'],
], function () {
    Route::get('/', [CategoryController::class, 'index'])->name('categories.list');
    Route::post('/create', [CategoryController::class, 'store'])->name('categories.store');
    Route::patch('/', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('/', [CategoryController::class, 'destroy'])->name('categories.destroy');
});
