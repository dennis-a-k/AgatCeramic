<?php

use App\Http\Controllers\KeramogranitController;
use Illuminate\Support\Facades\Route;

Route::get('/keramogranit', [KeramogranitController::class, 'index'])->name('keramogranit.list');
