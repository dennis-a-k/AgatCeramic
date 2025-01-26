<?php

use App\Http\Controllers\TextureController;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => '/admin-panel/textures',
    'middleware' => ['auth', 'verified'],
], function () {
    Route::get('/', [TextureController::class, 'index'])->name('texture.list');
    Route::post('/create', [TextureController::class, 'store'])->name('texture.store');
    Route::patch('/', [TextureController::class, 'update'])->name('texture.update');
    Route::delete('/', [TextureController::class, 'destroy'])->name('texture.destroy');
});
