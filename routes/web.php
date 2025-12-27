<?php

use App\Http\Controllers\Auth\GoogleAuthController;
use App\Http\Controllers\LandingPage\LandingPageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LandingPageController::class, 'index'])
    ->name('home');

Route::get('/auth/google', [GoogleAuthController::class, 'redirect'])
    ->name('google.login');

Route::get('/auth/google/callback', [GoogleAuthController::class, 'callback']);
