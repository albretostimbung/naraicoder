<?php

use App\Http\Controllers\Auth\GoogleAuthController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Events\EventController;
use App\Http\Controllers\Events\MyEventController;
use App\Http\Controllers\LandingPage\LandingPageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LandingPageController::class, 'index'])
    ->name('home');

Route::get('/auth/google', [GoogleAuthController::class, 'redirect'])
    ->name('google.login');

Route::get('/auth/google/callback', [GoogleAuthController::class, 'callback']);

Route::post('/admin/logout', LogoutController::class)
    ->name('filament.admin.auth.logout');

Route::middleware('auth')->group(function () {
// Logout Route
    Route::post('/logout', LogoutController::class)
        ->name('logout');

// My Events Routes
    Route::get('/my-events', [MyEventController::class, 'index'])
        ->name('my-events.index');
});

// Event Routes
Route::prefix('events')->group(function () {
    Route::get('/{event:slug}', [EventController::class, 'show'])->name('events.show');

    Route::post('/{event:slug}/register', [EventController::class, 'register'])->middleware('auth')->name('events.register');
});
