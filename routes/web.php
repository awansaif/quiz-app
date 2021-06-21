<?php

use App\Http\Controllers\Admin\Auth\AdminController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return redirect()->route('admin.showLoginForm');
});

Route::get('/reset-password/{token}', function ($token) {
    return view('auth.reset-password', ['token' => $token]);
})->middleware('guest')->name('password.reset');



Route::prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::group(['middleware', 'admin:guest'], function () {
            Route::get('/', [AdminController::class, 'showLoginForm'])->name('showLoginForm');
        });

        Route::group(['middleware', 'admin:auth'], function () {
            Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

            Route::resource('users', UserController::class);

            Route::resource('profile', ProfileController::class);
            Route::get('/logout', [AdminController::class, 'logout'])->name('logout');
        });
    });
