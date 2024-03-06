<?php

use App\Http\Controllers\KeramogranitController;
use Illuminate\Support\Facades\Route;

Route::get('/keramogranit', [KeramogranitController::class, 'index'])->name('keramogranit.list');
Route::get('/keramogranit-show', [KeramogranitController::class, 'show'])->name('keramogranit.show');
