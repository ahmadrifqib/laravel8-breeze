<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TimelineController;


Route::view('/', 'welcome');

Route::middleware('auth')->group(function () {
    Route::get('timeline', TimelineController::class)->name('timeline');
    Route::view('/dashboard', 'dashboard')->name('dashboard');
});

// middleware(['auth'])->

require __DIR__ . '/auth.php';
