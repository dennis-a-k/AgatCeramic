<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => '/admin/category',
    // 'middleware' => 'auth',
], function () {
    Route::get('/list', [CategoryController::class, 'index'])->name('category.list');
    Route::post('/create', [CategoryController::class, 'store'])->name('category.store');
    Route::patch('/', [CategoryController::class, 'update'])->name('category.update');
    Route::delete('/', [CategoryController::class, 'destroy'])->name('category.destroy');
});
