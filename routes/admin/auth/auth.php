<?php

use App\Http\Controllers\Auth\Admin\AuthenticatedSessionController;
use App\Http\Controllers\Auth\Admin\RegisteredUserController;
use App\Http\Controllers\Auth\Admin\UserController;
use App\Http\Controllers\Auth\Admin\VerifyEmailController;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => '/admin-panel',
    // 'middleware' => 'guest',
], function () {
    Route::get('/login', [AuthenticatedSessionController::class, 'login'])->name('login');
    Route::post('/login', [AuthenticatedSessionController::class, 'store'])->name('login.store');
});

Route::group([
    'prefix' => '/admin-panel/email',
    'middleware' => 'auth',
], function () {
    Route::get('/verify', [VerifyEmailController::class, 'notice'])->name('verification.notice');
    Route::get('/verify/{id}/{hash}', [VerifyEmailController::class, 'verify'])->name('verification.verify');
    Route::post('/verification-notification', [VerifyEmailController::class, 'send'])->middleware('throttle:6,1')->name('verification.send');
});

Route::group([
    'prefix' => '/admin-panel',
    'middleware' => ['auth', 'verified'],
], function () {
    Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('/register', [RegisteredUserController::class, 'store'])->name('user.store');

    Route::get('/logout', [AuthenticatedSessionController::class, 'logout'])->name('logout');
});
