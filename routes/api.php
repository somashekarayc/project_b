<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;





Route::prefix('api/v1')->group(function () {
    Route::post('/register', 'AuthController@register'); // Registration doesn't require authentication

    Route::middleware('auth:sanctum')->group(function () {
        // Route::post('/logout', 'AuthController@logout');
        Route::apiResource('users', UserController::class);  // Includes login, logout, and other user-related actions
    });
});
