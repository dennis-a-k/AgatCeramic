<?php

use App\Http\Controllers\EditorGoodsController;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => '/admin-panel',
    // 'middleware' => 'auth',
], function () {
    Route::get('/editor', [EditorGoodsController::class, 'index'])->name('editor');

    Route::post('/editor/import-goods', [EditorGoodsController::class, 'import'])->name('editor.import.goods');
    Route::get('/editor/export-goods', [EditorGoodsController::class, 'exportGoods'])->name('editor.export.goods');
});
