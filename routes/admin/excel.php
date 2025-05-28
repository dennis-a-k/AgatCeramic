<?php

use App\Http\Controllers\ExcelController;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => '/admin-panel',
    'middleware' => ['auth', 'verified'],
], function () {
    Route::post('/goods-import', [ExcelController::class, 'import'])->name('goods.import');
    Route::get('/goods-export', [ExcelController::class, 'export'])->name('goods.export');
    Route::get('/ceramic-template-export', [ExcelController::class, 'ceramicTemplateExport'])->name('ceramic.template.export');
    Route::get('/kleya-template-export', [ExcelController::class, 'kleyaTemplateExport'])->name('kleya.template.export');
    Route::get('/zatirka-template-export', [ExcelController::class, 'zatirkaTemplateExport'])->name('zatirka.template.export');
    Route::get('/plumbing-template-export', [ExcelController::class, 'plumbingTemplateExport'])->name('plumbing.template.export');
});
