<?php

use App\Http\Controllers\CallController;
use Illuminate\Support\Facades\Route;

Route::post('/order-call', [CallController::class, 'store'])->name('call');
