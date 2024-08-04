<?php

use App\Http\Controllers\Partner\PartnerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CommunityProfile\CommunityProfileController;
use App\Http\Controllers\Team\TeamController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::prefix('admin')->name('admin.')->middleware('role:admin')->group(function () {
        Route::resource('community-profiles', CommunityProfileController::class);
        Route::resource('partners', PartnerController::class);
        Route::resource('teams', TeamController::class);
    });
});

require __DIR__ . '/auth.php';
