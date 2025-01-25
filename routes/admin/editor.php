<?php

use App\Http\Controllers\EditorGoodsController;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => '/admin-panel',
    // 'middleware' => 'auth',
], function () {
    Route::get('/editor', [EditorGoodsController::class, 'index'])->name('editor');

    Route::post('/editor/import-goods', [EditorGoodsController::class, 'importGoods'])->name('editor.import.goods');
    Route::get('/editor/export-goods', [EditorGoodsController::class, 'exportGoods'])->name('editor.export.goods');

    Route::post('/editor/import-prices', [EditorGoodsController::class, 'importPrices'])->name('editor.import.prices');
    Route::get('/editor/export-prices', [EditorGoodsController::class, 'exportPrices'])->name('editor.export.prices');
});
