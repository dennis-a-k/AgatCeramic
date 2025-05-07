<?php

use App\Http\Controllers\ZatirkaController;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => '/admin-panel',
    'middleware' => ['auth', 'verified'],
], function () {
    Route::post('/zatirka-create', [ZatirkaController::class, 'store'])->name('zatirka.store');
    Route::get('/zatirka/{id}/edit', [ZatirkaController::class, 'edit'])->name('zatirka.edit');
    Route::patch('/zatirka/{id}', [ZatirkaController::class, 'update'])->name('zatirka.update');
});
