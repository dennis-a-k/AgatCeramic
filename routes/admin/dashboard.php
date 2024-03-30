<?php

use Illuminate\Support\Facades\Route;

// Route::get('/admin/dashboard', function () {
//     return view('pages.admin.dashboard');
// })->middleware(['auth', 'verified'])->name('admin.dashboard');
Route::get('/admin-panel/dashboard', function () {
    return view('pages.admin.dashboard');
})->name('admin.dashboard');
