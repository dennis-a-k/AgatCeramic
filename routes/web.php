<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
})->name('home');


require __DIR__.'/keramogranit.php';
