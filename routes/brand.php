<?php

use App\Http\Controllers\BrandController;
use Illuminate\Support\Facades\Route;

Route::get('/brand/{brand}', [BrandController::class, 'filterProducts'])->name('brand.list');
