<?php

use App\Http\Controllers\CallController;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => '/admin-panel',
    'middleware' => ['auth', 'verified'],
], function () {
    Route::get('/calls', [CallController::class, 'index'])->name('calls.list');
    Route::patch('/call/{id}/update-status', [CallController::class, 'updateStatus'])->name('call.update.status');
});
