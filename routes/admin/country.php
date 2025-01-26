<?php

use App\Http\Controllers\CountryController;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => '/admin-panel/countries',
    'middleware' => ['auth', 'verified'],
], function () {
    Route::get('/', [CountryController::class, 'index'])->name('country.list');
    Route::post('/create', [CountryController::class, 'store'])->name('country.store');
    Route::patch('/', [CountryController::class, 'update'])->name('country.update');
    Route::delete('/', [CountryController::class, 'destroy'])->name('country.destroy');
});
