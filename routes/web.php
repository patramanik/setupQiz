<?php

use Illuminate\Support\Facades\Route;



Route::get('/dashboard', function () {
    return view('dashboard.index');
})->name('dashboard');

// Redirect dashbord typo to dashboard
Route::redirect('/', '/dashboard');
