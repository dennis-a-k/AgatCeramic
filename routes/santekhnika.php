<?php

use App\Http\Controllers\SantekhnikaController;
use Illuminate\Support\Facades\Route;

Route::get('/santexnika', [SantekhnikaController::class, 'index'])->name('santexnika.list');
