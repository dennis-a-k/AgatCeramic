<?php

use App\Http\Controllers\FilterController;
use Illuminate\Support\Facades\Route;

Route::get('/filter', [FilterController::class, 'filter'])->name('filter');
Route::get('/filters', [FilterController::class, 'filters'])->name('filters');
