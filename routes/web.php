<?php

use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use App\Http\Controllers\Admin\Auth\AdminController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\QuestionController;
use App\Http\Controllers\Admin\QuizController as AdminQuizController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return redirect()->route('admin.showLoginForm');
});

Route::get('/reset-password/{token}', function ($token) {
    return view('user.auth.reset-password', ['token' => $token]);
})->middleware('guest')->name('password.reset');



Route::post('/reset-password', function (Request $request) {
    $request->validate([
        'token' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:8|confirmed',
    ]);

    $status = Password::reset(
        $request->only('email', 'password', 'password_confirmation', 'token'),
        function ($user, $password) {
            $user->forceFill([
                'password' => Hash::make($password)
            ])->setRememberToken(Str::random(60));

            $user->save();

            event(new PasswordReset($user));
        }
    );

    return $status === Password::PASSWORD_RESET
        ? back()->with('status', __($status))
        : back()->withErrors(['email' => [__($status)]]);
})->middleware('guest')->name('password.update');

Route::prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::group(['middleware', 'admin:guest'], function () {
            Route::get('/', [AdminController::class, 'showLoginForm'])->name('showLoginForm');
        });

        Route::group(['middleware', 'admin:auth'], function () {
            Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

            Route::resource('users', UserController::class);
            Route::resource('quizzes', AdminQuizController::class);
            Route::resource('questions', QuestionController::class);

            Route::resource('profile', ProfileController::class);
            Route::get('/logout', [AdminController::class, 'logout'])->name('logout');
        });
    });
