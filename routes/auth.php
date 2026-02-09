<?php

use Illuminate\Support\Facades\Route;

// middleware: auth, verified
Route::middleware(['auth', 'verified'])->group(function () {
    // dashboard
    Route::view('dashboard', 'dashboard')->name('dashboard');
});
