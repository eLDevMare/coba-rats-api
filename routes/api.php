<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::post('/me', [AuthController::class, 'me']);
});


    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/invalidate', [AuthController::class, 'invalidate'])->name('login');
    Route::post('/register', [AuthController::class, 'register']);
