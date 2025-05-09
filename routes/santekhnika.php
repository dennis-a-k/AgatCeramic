<?php

use App\Http\Controllers\SantekhnikaController;
use Illuminate\Support\Facades\Route;

Route::get('/plumbing', [SantekhnikaController::class, 'index'])->name('plumbing.list');
