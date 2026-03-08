<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthenticationController;
use App\Http\Controllers\Api\AdminController;
use App\Http\Controllers\Api\ProdukController;
use App\Http\Controllers\Api\KategoriController;
use App\Http\Controllers\Api\TransaksiController;

// Login
Route::post('/login', [AuthenticationController::class, 'login']);

// Verify Email
Route::post('/verifyEmail', [AuthenticationController::class, 'verifyEmail']);

// Change Password
Route::post('/changePassword', [AuthenticationController::class, 'changePassword']);

Route::middleware('auth:sanctum')->group(function () {

    // Unblock
    Route::post('/unblock', [AuthenticationController::class, 'unblock']);

    // Logout
    Route::post('/logout', [AuthenticationController::class, 'logout']);

});
