<?php

use Livewire\Volt\Volt;
use App\Mail\ChirpPosted;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChirpController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('test', function() {
    Mail::to('jan.novak@email.cz')->send(
        new ChirpPosted());

    return 'Done';
});

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
Route::get('chirps/{chirp}/edit', [ChirpController::class, 'edit'])->middleware('auth', 'verified')->name('chirps.edit'); 
Route::patch('chirps/{chirp}', [ChirpController::class, 'update'])->middleware('auth', 'verified')->name('chirps.update'); 
Route::delete('chirps/{chirp}', [ChirpController::class, 'destroy'])->middleware('auth', 'verified')->name('chirps.destroy'); 

require __DIR__.'/auth.php';
