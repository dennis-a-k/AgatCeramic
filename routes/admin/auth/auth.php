<?php

use App\Http\Controllers\Auth\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/admin-panel/login', [UserController::class, 'login'])->middleware('guest')->name('login');

Route::group([
    'prefix' => '/admin-panel',
    // 'middleware' => 'auth',
], function () {
    Route::get('/email/verify', [UserController::class, 'notice'])->name('verification.notice');
    Route::get('/email/verify/{id}/{hash}', [UserController::class, 'verify'])->name('verification.verify');
    Route::post('/email/verification-notification', [UserController::class, 'send'])->middleware('throttle:6,1')->name('verification.send');
});

Route::group([
    'prefix' => '/admin-panel',
    // 'middleware' => ['auth', 'verified']
], function () {
    Route::get('/register', [UserController::class, 'create'])->name('register');
    Route::post('/register', [UserController::class, 'store'])->name('user.store');
    Route::get('/logout', [UserController::class, 'logout'])->name('logout');
});
