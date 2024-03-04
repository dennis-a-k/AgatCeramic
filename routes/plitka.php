<?php

use App\Http\Controllers\PlitkaController;
use Illuminate\Support\Facades\Route;

Route::get('/plitka', [PlitkaController::class, 'index'])->name('plitka.list');
