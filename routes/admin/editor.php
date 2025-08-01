<?php

use App\Http\Controllers\EditorGoodsController;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => '/admin-panel',
    'middleware' => ['auth', 'verified'],
], function () {
    Route::get('/editor', [EditorGoodsController::class, 'index'])->name('editor');
    Route::post('/editor-import/{type}', [EditorGoodsController::class, 'import'])->name('editor.import');
    Route::get('/editor-export/{parametr?}', [EditorGoodsController::class, 'export'])->name('editor.export');
});
