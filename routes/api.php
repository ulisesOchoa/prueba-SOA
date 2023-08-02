<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TasksController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Public routes
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

// Protected routes
Route::group(['middleware' => ['auth:sanctum']], function () {

    // Tasks
    Route::resource('/tasks', TasksController::class);

    // Users
    Route::resource('/users', UserController::class)->only(['index']);

    // Logout
    Route::post('/logout', [AuthController::class, 'logout']);
});