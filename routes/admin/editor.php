<?php

use App\Http\Controllers\EditorGoodsController;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => '/admin-panel',
    // 'middleware' => 'auth',
], function () {
    Route::get('/goods-editor', [EditorGoodsController::class, 'index'])->name('goods.editor');
    Route::post('/goods-editor/import', [EditorGoodsController::class, 'import'])->name('goods.editor.import');
    Route::get('/goods-editor/export-goods', [EditorGoodsController::class, 'exportGoods'])->name('goods.editor.export.goods');
});
