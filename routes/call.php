<?php

use App\Http\Controllers\CallController;
use App\Http\Controllers\PartnershipsController;
use Illuminate\Support\Facades\Route;

Route::post('/order-call', [CallController::class, 'store'])->name('call');
Route::post('/partnerships-call', [PartnershipsController::class, 'store'])->name('call.partnerships');
