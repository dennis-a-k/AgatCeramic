<?php

use App\Http\Controllers\ProductContoller;
use Illuminate\Support\Facades\Route;

Route::get('/product/{product}', [ProductContoller::class, 'show'])->name('product.show');
