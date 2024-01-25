<?php

use App\Http\Controllers\Backend\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AuthController;

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

//___ Admin Panel ___//
Route::prefix('/admin')->group(function () {
    Route::controller(AuthController::class)->group(function () {
        Route::view('/', 'Backend.Pages.Auth.Login')->name('login.view');
        Route::view('/sign-up', 'Backend.Pages.Auth.Signup')->name('signup.view');
        Route::view('/recover-password', 'Backend.Pages.Auth.RecoverPass')->name('recoverpass.view');
        Route::view('/otp', 'Backend.Pages.Auth.Otp')->name('otp.view');
        Route::view('/verify-otp', 'Backend.Pages.Auth.OtpVerify');

        // Web API route
        Route::post('/sign-up', 'SignUp');
        Route::post('/login', 'Login');
        Route::post('/send-otp', 'SendOTP');
        Route::post('/verify-otp', 'VerifyOTP');
        Route::post('/update-password', 'UpdatePass');
        Route::get('/logout', 'LogOut')->name('log.out');

        // Protected route
        Route::middleware(['TokenVerify'])->group(function () {
            // View
            Route::view('/update-password', 'Backend.Pages.Auth.UpdatePass');
            Route::view('/dashboard', 'Backend.Pages.Dashboard.Dashboard');

            // Profile
            Route::get('/profile', 'ProfilePage')->name('profile.view');
            // // Web API route
            Route::get('/profile-data', 'UserProfile');
            Route::post('/update-profile', 'UserProfileUpdate');
        });
    });

    Route::controller(CategoryController::class)->group(function () {
        // Protected route
        Route::middleware(['TokenVerify'])->group(function () {
            Route::get('/categories', 'CategoryList');
            Route::post('/create-category', 'CreateCategory');
            Route::post('/delete-category', 'DeleteCategory');
        });
    });
});