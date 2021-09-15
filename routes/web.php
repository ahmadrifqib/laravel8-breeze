<?php

use App\Http\Controllers\ProfileInformationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\TimelineController;


Route::view('/', 'welcome');

Route::middleware('auth')->group(function () {
    Route::get('timeline', TimelineController::class)->name('timeline');
    // Route::view('/dashboard', 'dashboard')->name('dashboard');
    Route::post('status', [StatusController::class, 'store'])->name('status.store');
    Route::get('profile/{user}', ProfileInformationController::class)->name('profile')->withoutMiddleware('auth');
});

// middleware(['auth'])->

require __DIR__ . '/auth.php';
