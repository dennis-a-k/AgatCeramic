<?php

use App\Http\Controllers\KleevyeSmesiController;
use Illuminate\Support\Facades\Route;

Route::get('/kleevye-smesi', [KleevyeSmesiController::class, 'index'])->name('kleevye-smesi.list');
