<?php

use App\Http\Controllers\SantekhnikaController;
use Illuminate\Support\Facades\Route;

Route::get('/santekhnika', [SantekhnikaController::class, 'index'])->name('santekhnika.list');
