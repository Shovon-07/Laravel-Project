<?php

use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\Backend\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//___ Front end ___//
Route::prefix('/')->group(function () {
    Route::view('/', 'Frontend.Pages.Index');
});

//___ Back end ___//
Route::prefix('/admin')->group(function () {
    Route::view('/', 'Backend.Pages.Auth.Login')->name('login');
    Route::view('/sign-up', 'Backend.Pages.Auth.Signup')->name('signup.view');
    Route::view('/send-otp', 'Backend.Pages.Auth.RecoverPass')->name('forgotpass.view');
    Route::view('/verify-otp', 'Backend.Pages.Auth.OtpVerify');
    Route::view('/update-password', 'Backend.Pages.Auth.UpdatePass');

    //___ API ___//
    Route::controller(AuthController::class)->group(function () {
        Route::post('/sign-up', 'Signup');
        Route::post('/login', 'Login');
        Route::post('/send-otp', 'SendOtp');
        Route::post('/verify-otp', 'VerifyOtp');
        Route::post('/update-password', 'UpdatePassword');
        Route::get('/logout', 'Logout')->name('logout')->middleware('auth:sanctum');
    });

    Route::controller(ProfileController::class)->group(function () {
        Route::view('/dashboard', 'Backend.Pages.Dashboard.Dashboard');
        Route::middleware(['auth:sanctum'])->group(function () {
            //___ API ___//
            // Route::get('/dashboard', 'Dashboard');
            Route::get('/profile', 'ProfileData')->name('profile.view');
        });
    });
});