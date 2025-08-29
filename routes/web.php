<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

// Public routes
Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/age-verification', function() {
    return view('auth.age-verification');
})->name('age-verification')->middleware('auth');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    
    Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile.index');
    Route::put('/profile', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
    
    // Settings routes
    Route::prefix('settings')->name('settings.')->group(function () {
        Volt::route('profile', 'settings.profile')
            ->name('profile');
        
        Volt::route('password', 'settings.password')
            ->name('password');
        
        Volt::route('appearance', 'settings.appearance')
            ->name('appearance');
    });
});

Route::middleware(['auth', 'verified', 'adult'])->group(function () {
    Route::get('/betting', [App\Http\Controllers\BettingController::class, 'index'])->name('betting.index');
    Route::get('/leaderboard', [App\Http\Controllers\LeaderboardController::class, 'index'])->name('leaderboard.index');
    Route::get('/teams', [App\Http\Controllers\TeamController::class, 'index'])->name('teams.index');
});

require __DIR__.'/auth.php';
