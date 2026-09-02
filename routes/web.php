<?php

use App\Http\Controllers\GoogleController;
use App\Http\Controllers\QrCodeController;
use Illuminate\Support\Facades\Route;
use LaravelQRCode\Facades\QRCode;

Route::view('/', 'welcome')->name('home');

Route::redirect('/', '/login');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::redirect('dashboard', 'authenticated')->name('dashboard');
    Route::get('/authenticated', [GoogleController::class, 'authenticated'])->name('authenticated');
});

require __DIR__.'/settings.php';

Route::get('/auth/google', [GoogleController::class, 'googlePage'])->name('google');
Route::get('/auth/google/callback', [GoogleController::class, 'googleCallBack'])->name('googleCallback');

Route::get('verify/{uuid}', [QrCodeController::class, 'verify'])->name('verify');
