<?php

use App\Http\Controllers\MozaikaController;
use Illuminate\Support\Facades\Route;

Route::get('/mozaika', [MozaikaController::class, 'index'])->name('mozaika.list');
