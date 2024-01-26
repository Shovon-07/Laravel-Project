<?php

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
    Route::view('/', 'Backend.Pages.Auth.Login')->name('login');
    Route::view('/signup', 'Backend.Pages.Auth.Signup')->name('signup.view');
    Route::view('/forgot-password', 'Backend.Pages.Auth.RecoverPass')->name('forgotpass.view');


});
