<?php

use App\Http\Controllers\Api\v1\ChangePasswordController;
use App\Http\Controllers\Api\v1\ForgetPasswordController;
use App\Http\Controllers\Api\v1\LoginController;
use App\Http\Controllers\Api\v1\ProfileController;
use App\Http\Controllers\Api\v1\QuizController;
use App\Http\Controllers\Api\v1\RegisterController;
use App\Http\Controllers\Api\v1\UserController;
use App\Http\Controllers\ArsalanController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('register', [RegisterController::class, 'register']);
Route::post('login', [LoginController::class, 'login']);


Route::middleware('auth:sanctum')->group(function () {

    Route::get('profile', [ProfileController::class, 'profile']);
    Route::post('changeprofilepicture', [ProfileController::class, 'updateProfilePicture']);
    Route::post('updateprofile', [ProfileController::class, 'updateProfile']);
    Route::post('changepassword', [ChangePasswordController::class, 'changePassword']);
    Route::post('forgetpassword', [ForgetPasswordController::class, 'sendResetMail']);
    Route::get('firstscreen', [QuizController::class, 'firstScreen']);
    Route::get('secondscreen/{id}', [QuizController::class, 'secondScreen']);
    Route::get('thirdscreen/{id}', [QuizController::class, 'thirdScreen']);
    Route::get('question/{id}', [QuizController::class, 'question']);

    Route::get('logout', [UserController::class, 'logout']);
});



Route::post('project-email', [ArsalanController::class, 'sendMail']);
