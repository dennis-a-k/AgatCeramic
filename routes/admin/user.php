<?php

use App\Http\Controllers\Auth\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => '/admin-panel',
    // 'middleware' => 'auth',
], function () {
    Route::get('/users', [UserController::class, 'index'])->name('users');
});
