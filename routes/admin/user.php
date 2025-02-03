<?php

use App\Http\Controllers\Auth\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => '/admin-panel',
    'middleware' => ['auth', 'verified'],
], function () {
    Route::get('/users', [UserController::class, 'index'])->name('users');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');

    Route::get('/profile', [UserController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/update-name', [UserController::class, 'updateName'])->name('profile.update.name');
    Route::put('/profile/update-email', [UserController::class, 'updateEmail'])->name('profile.update.email');
    Route::put('/profile/update-password', [UserController::class, 'updatePassword'])->name('profile.update.password');
});
