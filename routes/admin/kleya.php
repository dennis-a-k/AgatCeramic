<?php

use App\Http\Controllers\KleevyeSmesiController;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => '/admin-panel',
    'middleware' => ['auth', 'verified'],
], function () {
    Route::post('/kleya-create', [KleevyeSmesiController::class, 'store'])->name('kleya.store');
    Route::get('/kleya/{id}/edit', [KleevyeSmesiController::class, 'edit'])->name('kleya.edit');
    Route::patch('/kleya/{id}', [KleevyeSmesiController::class, 'update'])->name('kleya.update');
});
