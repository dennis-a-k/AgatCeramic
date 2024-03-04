<?php

use App\Http\Controllers\StupeniController;
use Illuminate\Support\Facades\Route;

Route::get('/stupeni', [StupeniController::class, 'index'])->name('stupeni.list');
