<?php

use App\Http\Controllers\ProductContoller;
use Illuminate\Support\Facades\Route;

Route::get('/product/{product}', [ProductContoller::class, 'show'])->name('product.show');
Route::get('/api/product/{id}', [ProductContoller::class, 'modal'])->name('product.modal');
