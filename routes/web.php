<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\TimelineController;
use App\Http\Controllers\FollowingController;
use App\Http\Controllers\ExploreUserController;
use App\Http\Controllers\ProfileInformationController;
use App\Http\Controllers\UpdateProfileInformationController;

Route::get('/', WelcomeController::class);

Route::middleware('auth')->group(function () {
    Route::get('timeline', TimelineController::class)->name('timeline');
    // Route::view('/dashboard', 'dashboard')->name('dashboard');
    Route::get('explore', ExploreUserController::class)->name('users.index');
    Route::post('status', [StatusController::class, 'store'])->name('status.store');
    Route::prefix('profile')->group(function () {
        Route::get('edit', [UpdateProfileInformationController::class, 'edit'])->name('profile.edit');
        Route::put('update', [UpdateProfileInformationController::class, 'update'])->name('profile.update');

        Route::get('{user}', ProfileInformationController::class)->name('profile')->withoutMiddleware('auth');
        // Route::get('{user}/following', [FollowingController::class, 'following'])->name('profile.following');
        // Route::get('{user}/follower', [FollowingController::class, 'follower'])->name('profile.follower');
        // Route::get('{user}/{following}', FollowingController::class)->name('profile.following'); __invoke
        Route::get('{user}/{following}', [FollowingController::class, 'index'])->name('following.index');
        Route::post('{user}', [FollowingController::class, 'store'])->name('following.store');
    });
});

// middleware(['auth'])->

require __DIR__ . '/auth.php';
