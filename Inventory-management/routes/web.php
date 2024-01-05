<?php

use App\Http\Controllers\UserController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::controller(UserController::class)->group(function () {
    //___ View ___//
    Route::view('/', 'Pages.Auth.Login')->name('login.view');
    Route::view('/signup', 'Pages.Auth.Register')->name('signup.view');
    Route::view('/forgot-password', 'Pages.Auth.ForgotPass')->name('forgotpass.view');
    Route::view('/otp', 'Pages.Auth.Otp')->name('otp.view');

    Route::post('/registration', 'Registration');
    Route::post('/login', 'Login');
    Route::post('/send-otp', 'SendOtpCode');
    Route::post('/verify-otp', 'VerifyOtp');

    //___ Token verified routes ___//
    Route::middleware(['tokenVerify'])->group(function () {
        Route::post('/reset-password', 'ResetPassword');
    });
});
