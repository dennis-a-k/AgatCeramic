<?php

use App\Http\Controllers\PatternController;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => '/admin-panel/patterns',
    'middleware' => ['auth', 'verified'],
], function () {
    Route::get('/', [PatternController::class, 'index'])->name('pattern.list');
    Route::post('/create', [PatternController::class, 'store'])->name('pattern.store');
    Route::patch('/', [PatternController::class, 'update'])->name('pattern.update');
    Route::delete('/', [PatternController::class, 'destroy'])->name('pattern.destroy');
});
