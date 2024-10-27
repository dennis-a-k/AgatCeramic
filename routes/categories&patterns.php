<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PatternController;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => '/goods/{category}',
], function () {
    Route::get('/', [CategoryController::class, 'filterProducts'])->name('category.list');
    Route::get('/{pattern}', [PatternController::class, 'filterProducts'])->name('category.pattern');
});
