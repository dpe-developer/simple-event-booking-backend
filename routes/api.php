<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\V1\AuthController;
use App\Http\Controllers\API\V1\EventController;
use App\Http\Controllers\API\V1\BookingController;
use App\Http\Controllers\API\V1\DashboardController;

Route::prefix('v1')->group(function () {
    Route::prefix('auth')->group(function () {
        Route::post('/register', [AuthController::class, 'register']);
        Route::post('/login', [AuthController::class, 'login']);
        Route::middleware('auth:sanctum')->group(function () {
            Route::get('/user', [AuthController::class, 'user']);
            Route::post('/logout', [AuthController::class, 'logout']);
        });
    });

    Route::middleware('auth:sanctum')->group(function () {
        Route::prefix('admin')->group(function () {
            Route::middleware('role:admin')->group(function () {
                Route::apiResource('events', EventController::class);
                Route::get('dashboard', [DashboardController::class, 'index']);
            });
        });
        
        Route::middleware('role:user')->group(function () {
            Route::post('events/{event}/book', [BookingController::class, 'book']);
            Route::get('bookings', [BookingController::class, 'userBookings']);
            Route::delete('bookings/{booking}', [BookingController::class, 'cancelBooking']);
        });
    });
    Route::get('upcoming-events/', [EventController::class, 'upcomingEvents']);
});