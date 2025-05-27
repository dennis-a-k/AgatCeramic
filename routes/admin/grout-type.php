<?php

use App\Http\Controllers\GroutTypeController;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => '/admin-panel/grout_type',
    'middleware' => ['auth', 'verified'],
], function () {
    Route::get('/', [GroutTypeController::class, 'index'])->name('grout_type.index');
    Route::post('/create', [GroutTypeController::class, 'store'])->name('grout_type.store');
    Route::patch('/', [GroutTypeController::class, 'update'])->name('grout_type.update');
});
