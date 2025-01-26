<?php

use App\Http\Controllers\CollectionController;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => '/admin-panel/collections',
    'middleware' => ['auth', 'verified'],
], function () {
    Route::get('/', [CollectionController::class, 'index'])->name('collection.list');
    Route::post('/create', [CollectionController::class, 'store'])->name('collection.store');
    Route::patch('/', [CollectionController::class, 'update'])->name('collection.update');
    Route::delete('/', [CollectionController::class, 'destroy'])->name('collection.destroy');
});
