<?php

use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;





// Redirect dashbord typo to dashboard
// Route::redirect('/', '/dashboard');


Route::get('/', [AuthController::class, 'showLogin'])->name('login');
Route::get('/dashboard', function () {
    return view('dashboard.index');
})->name('dashboard');
