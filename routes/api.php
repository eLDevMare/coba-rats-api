<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\PlaceController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::post('/me', [AuthController::class, 'me']);
});

    Route::get('/place/{bokingId}/{date}', [PlaceController::class, 'getData']);
    Route::post('/booking/post', [BookingController::class, 'booking']);
    Route::patch('/booking/confirm/auto/post', [BookingController::class, 'confirmBokingAuto']);
    Route::patch('/booking/declined/auto/post', [BookingController::class, 'declinedBokingAuto']);
    Route::post('/booking/confirm/post/{placeId}/{date}', [BookingController::class, 'confirmBoking']);
    Route::delete('/booking/unconfirm/post/{placeId}/{date}', [BookingController::class, 'unconfirmBoking']);

    Route::get('/game', [GameController::class, 'getAllGame']);
    Route::get('/game/{gameId}', [GameController::class, 'getGameDetail']);
    Route::post('/game/store', [GameController::class, 'storeGame']);
    Route::post('/game/update/{gameId}', [GameController::class, 'updateGame']);
    Route::delete('/game/delete/{gameId}', [GameController::class, 'deleteGame']);
    Route::post('/game/place/update/{placeId}', [GameController::class, 'updateGameRoom']);

    Route::get('room/game/{place_id}', [GameController::class, 'getGameRoom']);
    Route::get('/place/{placeId}', [PlaceController::class, 'getPlaceDetail']);
    Route::patch('/place/post/{placeId}', [PlaceController::class, 'updatePlace']);

    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/invalidate', [AuthController::class, 'invalidate'])->name('login');
    Route::post('/register', [AuthController::class, 'register']);
