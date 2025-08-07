<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

Route::get('/', [IndexController::class, 'index'])->name('home');

Route::get('/payment&delivery', function () {
    return view('pages.delivery');
})->name('delivery');

Route::get('/return', function () {
    return view('pages.return');
})->name('return');

Route::get('/partnerships', function () {
    return view('pages.partnerships');
})->name('partnerships');
Route::get('/partnerships2', function () {
    return view('pages.partnerships2');
})->name('partnerships2');
Route::get('/partnerships3', function () {
    return view('pages.partnerships3');
})->name('partnerships3');

Route::get('/contact', function () {
    return view('pages.contact');
})->name('contact');

Route::get('/policy', function () {
    return view('pages.policy');
})->name('policy');

Route::get('/personal-data', function () {
    return view('pages.personal-data');
})->name('personal-data');

Route::get('/rezka', function () {
    return view('pages.rezka');
})->name('rezka');

Route::get('/rospis', function () {
    return view('pages.rospis');
})->name('rospis');

Route::get('/order/success/{order_number}', [OrderController::class, 'success'])->name('order.success');

Route::fallback(function () {
    return view('errors.404');
});

Route::fallback(function () {
    return view('errors.500');
});
