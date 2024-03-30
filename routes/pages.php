<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
})->name('home');

Route::get('/delivery', function () {
    return view('pages.delivery');
})->name('delivery');

Route::get('/return', function () {
    return view('pages.return');
})->name('return');

Route::get('/partnerships', function () {
    return view('pages.partnerships');
})->name('partnerships');

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






Route::get('/admin/prosto', function () {
    return view('pages.prosto');
})->name('prosto');
