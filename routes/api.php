<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserSettingController;

Route::prefix('v1')->group(function () {
    Route::post('/register', [AuthController::class,'register']);
    Route::middleware('auth:sanctum')->group(function () {
        Route::apiResource('users', UserController::class);
        Route::apiResource('usersettings', UserSettingController::class);
        Route::apiResource('tasks', TaskController::class);
    });
});
