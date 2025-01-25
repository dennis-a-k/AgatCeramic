<?php

use App\Http\Controllers\EditorGoodsController;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => '/admin-panel',
    // 'middleware' => 'auth',
], function () {
    Route::get('/editor', [EditorGoodsController::class, 'index'])->name('editor');

    Route::post('/editor-import/goods', [EditorGoodsController::class, 'importGoods'])->name('editor.import.goods');
    Route::post('/editor-import/prices', [EditorGoodsController::class, 'importPrices'])->name('editor.import.prices');
    Route::post('/editor-import/statuses', [EditorGoodsController::class, 'importStatuses'])->name('editor.import.statuses');
    Route::post('/editor-import/sales', [EditorGoodsController::class, 'importSales'])->name('editor.import.sales');

    Route::get('/editor-export/{parametr}', [EditorGoodsController::class, 'export'])->name('editor.export');
});
