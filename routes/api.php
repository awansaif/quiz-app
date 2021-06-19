<?php

use App\Http\Controllers\Api\v1\ChangePasswordController;
use App\Http\Controllers\Api\v1\LoginController;
use App\Http\Controllers\Api\v1\ProfileController as V1ProfileController;
use App\Http\Controllers\Api\v1\RegisterController;
use App\Http\Controllers\Api\v1\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('register', [RegisterController::class, 'register']);
Route::post('login', [LoginController::class, 'login']);


Route::middleware('auth:sanctum')->group(function () {

    Route::get('profile', [V1ProfileController::class, 'profile']);
    Route::post('changepassword', [ChangePasswordController::class, 'changePassword']);

    Route::get('logout', [UserController::class, 'logout']);
});
