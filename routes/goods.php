<?php

use App\Http\Controllers\GoodsController;
use Illuminate\Support\Facades\Route;

Route::post('/goods-import', [GoodsController::class, 'import'])->name('goods.import');
Route::get('/goods-export', [GoodsController::class, 'export'])->name('goods.export');
