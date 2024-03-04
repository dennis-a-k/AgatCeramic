<?php

use App\Http\Controllers\KlinkerController;
use Illuminate\Support\Facades\Route;

Route::get('/klinker', [KlinkerController::class, 'index'])->name('klinker.list');
