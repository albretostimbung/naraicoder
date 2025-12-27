<?php

use App\Http\Controllers\Auth\GoogleAuthController;
use App\Http\Controllers\Events\EventController;
use App\Http\Controllers\LandingPage\LandingPageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LandingPageController::class, 'index'])
    ->name('home');

Route::get('/auth/google', [GoogleAuthController::class, 'redirect'])
    ->name('google.login');

Route::get('/auth/google/callback', [GoogleAuthController::class, 'callback']);

// Event Routes
Route::prefix('events')->group(function () {
    Route::get('/', [EventController::class, 'index'])->name('events.index');
    Route::get('/{event:slug}', [EventController::class, 'show'])->name('events.show');

    Route::post('/{event:slug}/register', [EventController::class, 'register'])->middleware('auth')->name('events.register');
});
