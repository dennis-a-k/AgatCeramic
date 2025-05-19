<?php

use App\Http\Controllers\SantekhnikaController;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => '/santekhnika',
], function () {
    Route::get('/', [SantekhnikaController::class, 'index'])->name('plumbing.list');
    Route::get('/{category}', [SantekhnikaController::class, 'filterPlumbing'])->name('plumbing.category');
});
