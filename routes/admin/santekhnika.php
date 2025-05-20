<?php

use App\Http\Controllers\SantekhnikaController;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => '/admin-panel',
    'middleware' => ['auth', 'verified'],
], function () {
    Route::post('/santekhnika-create', [SantekhnikaController::class, 'store'])->name('plumbing.store');
    Route::get('/santekhnika/{id}/edit', [SantekhnikaController::class, 'edit'])->name('plumbing.edit');
    Route::patch('/santekhnika/{id}', [SantekhnikaController::class, 'update'])->name('plumbing.update');
});
