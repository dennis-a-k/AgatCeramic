<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::get('/category/{category}', [CategoryController::class, 'filterProducts'])->name('category.list');