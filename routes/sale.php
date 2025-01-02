<?php

use App\Http\Controllers\SaleController;
use Illuminate\Support\Facades\Route;

Route::get('/sale', [SaleController::class, 'saleFilter'])->name('sale');
Route::get('/sale/filter', [SaleController::class, 'saleFilter'])->name('sale.filter');
