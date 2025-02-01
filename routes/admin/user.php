<?php

use App\Http\Controllers\Auth\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => '/admin-panel',
    'middleware' => ['auth', 'verified'],
], function () {
    Route::get('/users', [UserController::class, 'index'])->name('users');

    Route::get('/user/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::post('/user/{id}/update-name', [UserController::class, 'updateName'])->name('user.update.name');
    Route::post('/user/{id}/update-email', [UserController::class, 'updateEmail'])->name('user.update.email');
    Route::post('/user/{id}/update-password', [UserController::class, 'updatePassword'])->name('user.update.password');
});
