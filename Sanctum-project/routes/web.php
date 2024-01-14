<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;

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

Route::prefix('/')->group(function () {
    Route::view('/', 'welcome');
    Route::view('/login', 'Login')->name('login');

    Route::controller(AuthController::class)->group(function () {
        //___ API ___//
        Route::post('/sign-up', 'SignUp');
        Route::post('/login', 'Login');

        Route::middleware('auth:sanctum')->group(function () {
            Route::get('/user-profile', 'UserProfile')->name('user.profile');
            Route::post('/update-profile', 'UpdateProfile')->name('update.profile');
            Route::get('/logout', 'Logout')->name('log.out');
        });
    });
});
