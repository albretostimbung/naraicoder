<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('front.index');
})->name('front.index');
