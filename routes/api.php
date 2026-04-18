<?php

use App\Http\Controllers\StudentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('/student/login', [StudentController::class, 'login']);
Route::post('/student/register', [StudentController::class, 'register']);

// Route::middleware('auth:sanctum')->get('/student/profile', function (Request $request) {
//     return $request->user();
// });