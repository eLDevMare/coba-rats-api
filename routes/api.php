<?php

use App\Http\Controllers\AdminBookingController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserBookingController;
use App\Http\Controllers\AdminGameController;
use App\Http\Controllers\UserPlaceController;
use App\Http\Controllers\AdminDashboardController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/me', [AuthController::class, 'me']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
});
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/invalidate', [AuthController::class, 'invalidate'])->name('login');
    Route::post('/register', [AuthController::class, 'register']);


    //User
    Route::get('/places', [UserPlaceController::class, 'allPlace']);
    Route::get('/place/get/{bokingId}', [UserPlaceController::class, 'getData']);
    Route::get('/place/session/{date}/{bokingId}', [UserPlaceController::class, 'getSession']);

    Route::post('/booking/post', [UserBookingController::class, 'booking']);





    //Admin

    //Dashboard
    Route::get('dashboard/game/{place_id}', [AdminDashboardController::class, 'getGameDashbaord']);


    Route::patch('/booking/confirm/auto/post', [AdminBookingController::class, 'confirmBokingAuto']);
    Route::patch('/booking/declined/auto/post', [AdminBookingController::class, 'declinedBokingAuto']);
    Route::post('/booking/confirm/post/{date}', [AdminBookingController::class, 'confirmBoking']);
    Route::delete('/booking/unconfirm/post/{date}', [AdminBookingController::class, 'unconfirmBoking']);

    Route::get('/game', [AdminGameController::class, 'getAllGame']);
    Route::get('/game/{gameId}', [AdminGameController::class, 'getGameDetail']);
    Route::post('/game/store', [AdminGameController::class, 'storeGame']);
    Route::post('/game/update/{gameId}', [AdminGameController::class, 'updateGame']);
    Route::delete('/game/delete/{gameId}', [AdminGameController::class, 'deleteGame']);
    Route::post('/game/place/update/{placeId}', [AdminGameController::class, 'updateGameRoom']);



    Route::get('room/game/{place_id}', [AdminGameController::class, 'getGameRoom']);
    Route::get('/place/{placeId}', [UserPlaceController::class, 'getPlaceDetail']);
    Route::patch('/place/post/{placeId}', [UserPlaceController::class, 'updatePlace']);

