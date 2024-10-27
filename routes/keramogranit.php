<?php

use App\Http\Controllers\KeramogranitController;
use Illuminate\Support\Facades\Route;

Route::get('/keramogranit-show', [KeramogranitController::class, 'show'])->name('keramogranit.show');
