<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Middleware\PreventBackHistory;
use Illuminate\Support\Facades\Route;





// Redirect dashbord typo to dashboard
// Route::redirect('/', '/dashboard');


Route::get('/', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;

// Protecting these routes with 'auth' middleware
Route::middleware(['auth', PreventBackHistory::class])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard.index');
    })->name('dashboard');

    // Role and User Management Routes 
    Route::resource('roles', RoleController::class)
         ->middleware(\App\Http\Middleware\CheckPermission::class . ':manage roles');

    // Users Management Routes (Broken down for specific permissions)
    Route::get('users', [\App\Http\Controllers\UserController::class, 'index'])->name('users.index')->middleware(\App\Http\Middleware\CheckPermission::class . ':manage users');
    Route::get('users/create', [\App\Http\Controllers\UserController::class, 'create'])->name('users.create')->middleware(\App\Http\Middleware\CheckPermission::class . ':create user');
    Route::post('users', [\App\Http\Controllers\UserController::class, 'store'])->name('users.store')->middleware(\App\Http\Middleware\CheckPermission::class . ':create user');
    Route::get('users/{user}', [\App\Http\Controllers\UserController::class, 'show'])->name('users.show')->middleware(\App\Http\Middleware\CheckPermission::class . ':manage users');
    Route::get('users/{user}/edit', [\App\Http\Controllers\UserController::class, 'edit'])->name('users.edit')->middleware(\App\Http\Middleware\CheckPermission::class . ':manage users');
    Route::put('users/{user}', [\App\Http\Controllers\UserController::class, 'update'])->name('users.update')->middleware(\App\Http\Middleware\CheckPermission::class . ':manage users');
    Route::delete('users/{user}', [\App\Http\Controllers\UserController::class, 'destroy'])->name('users.destroy')->middleware(\App\Http\Middleware\CheckPermission::class . ':manage users');

    // The Logout Route
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
// Route::get('/dashboard', function () {
//     return view('dashboard.index');
// })->name('dashboard');
