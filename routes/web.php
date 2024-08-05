<?php

use App\Http\Controllers\Article\ArticleController;
use App\Http\Controllers\Partner\PartnerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CommunityProfile\CommunityProfileController;
use App\Http\Controllers\Event\EventController;
use App\Http\Controllers\Front\FrontController;
use App\Http\Controllers\SocialProfile\SocialProfileController;
use App\Http\Controllers\Team\TeamController;

Route::get('/', [FrontController::class, 'index'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::prefix('admin')->name('admin.')->middleware('role:admin')->group(function () {
        Route::resource('community-profiles', CommunityProfileController::class);
        Route::resource('social-profiles', SocialProfileController::class);
        Route::resource('partners', PartnerController::class);
        Route::resource('teams', TeamController::class);
        Route::resource('articles', ArticleController::class);
        Route::resource('events', EventController::class);
    });
});

require __DIR__ . '/auth.php';
