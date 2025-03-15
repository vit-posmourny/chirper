<?php

use Livewire\Volt\Volt;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChirpController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

Route::post('chirps', [ChirpController::class, 'store'])->middleware('auth', 'verified')->name('chirps.store'); 
Route::get('chirps', [ChirpController::class, 'index'])->middleware('auth', 'verified')->name('chirps.index'); 
Route::post('chirps/{chirp}/edit', [ChirpController::class, 'edit'])->middleware('auth', 'verified')->name('chirps.edit'); 
Route::patch('chirps/{chirp}', [ChirpController::class, 'update'])->middleware('auth', 'verified')->name('chirps.update'); 

require __DIR__.'/auth.php';
