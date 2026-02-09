<?php

use Illuminate\Support\Facades\Route;

// middleware: guest
Route::middleware(['guest'])->group(function () {
    Route::get('/', function () {
        return view('welcome');
    })->name('home');
});

// middleware: auth, verified
Route::middleware(['auth', 'verified'])->group(function () {
    // dashboard
    Route::view('dashboard', 'dashboard')->name('dashboard');
});

// settings routes
require __DIR__.'/settings.php';
