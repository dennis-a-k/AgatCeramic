<?php

use App\Http\Controllers\ZipController;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => '/admin-panel',
    'middleware' => ['auth', 'verified'],
], function () {
    Route::post('/import-zip', [ZipController::class, 'importZip'])->name('admin.zip.import');
});
