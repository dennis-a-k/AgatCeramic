<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => '/goods/{category}',
], function () {
    Route::get('/', [CategoryController::class, 'filterProducts'])->name('category.list1');
});
