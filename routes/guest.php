<?php

use Illuminate\Support\Facades\Route;

// middleware: guest
Route::middleware(['guest'])->group(function () {
    // /
    Route::get('/', function () {
        return view('welcome');
    })->name('home');

    // about
    Route::get('/about', function () {
        return view('about');
    })->name('about');
});
