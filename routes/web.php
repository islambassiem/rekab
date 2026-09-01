<?php

use App\Http\Controllers\GoogleController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');

Route::redirect('/', '/login');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
    Route::get('/authenticated', [GoogleController::class, 'authenticated'])->name('authenticated');
});

require __DIR__.'/settings.php';

Route::get('/auth/google', [GoogleController::class, 'googlePage'])->name('google');
Route::get('/auth/google/callback', [GoogleController::class, 'googleCallBack'])->name('google-callback');

Route::get('/authenticated', [GoogleController::class, 'authenticated'])->name('authenticated');
