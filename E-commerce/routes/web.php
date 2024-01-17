<?php

use App\Http\Controllers\Backend\AuthController;
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

//___ Front end ___//
Route::prefix('/')->group(function () {
    Route::view('/', 'Frontend.Pages.Index');
});

//___ Back end ___//
Route::prefix('/admin')->group(function () {
    Route::view('/', 'Backend.Pages.Auth.Login')->name('login.view');
    Route::view('/signup', 'Backend.Pages.Auth.Signup')->name('signup.view');
    Route::view('/forgot-password', 'Backend.Pages.Auth.RecoverPass')->name('forgotpass.view');
    Route::view('/verify-otp', 'Backend.Pages.Auth.OtpVerify')->name('verify.otp');

    //___ API ___//
    Route::controller(AuthController::class)->group(function () {
        Route::post('/sign-up', 'Signup');
        Route::post('/login', 'Login');
        Route::post('/send-otp', 'SendOTP');
        Route::post('/verify-otp', 'VerifyOTP');
    });
});