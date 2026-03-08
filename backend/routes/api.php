<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthenticationController;
use App\Http\Controllers\Api\AdminController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\TransactionController;

// Login
Route::post('/login', [AuthenticationController::class, 'login']);

// Verify Email
Route::post('/verifyEmail', [AuthenticationController::class, 'verifyEmail']);

// Verify Otp
Route::post('/verifyOtp', [AuthenticationController::class, 'verifyOtp']);

// Change Password
Route::post('/changePassword', [AuthenticationController::class, 'changePassword']);

Route::middleware('auth:sanctum')->group(function () {

    // Unblock
    Route::post('/unblock', [AuthenticationController::class, 'unblock']);

    // Logout
    Route::post('/logout', [AuthenticationController::class, 'logout']);

});
