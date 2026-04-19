<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Middleware\PreventBackHistory;
use Illuminate\Support\Facades\Route;





// Redirect dashbord typo to dashboard
// Route::redirect('/', '/dashboard');


Route::get('/', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
// Protecting these routes with 'auth' middleware
Route::middleware(['auth', PreventBackHistory::class])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard.index');
    })->name('dashboard');

    // The Logout Route
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
// Route::get('/dashboard', function () {
//     return view('dashboard.index');
// })->name('dashboard');
