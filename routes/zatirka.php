<?php

use App\Http\Controllers\ZatirkaController;
use Illuminate\Support\Facades\Route;

Route::get('/zatirka', [ZatirkaController::class, 'index'])->name('zatirka.list');
