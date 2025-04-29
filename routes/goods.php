<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/api/product/{id}', [ProductController::class, 'modal'])->name('product.modal');
Route::get('/{category}/{slug}/{sku}', [ProductController::class, 'show'])
    ->name('product.show')
    ->where([
        'category' => '[a-z0-9-]+',
        'slug' => '[a-z0-9-]+',
        'sku' => '[a-zA-Z0-9-_]+',
    ]);
