<?php

use App\Http\Controllers\Backend\BackendController;
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

Route::get('/', function () {
    return view('welcome');
});

//___ Admin Dashboard ___//
Route::prefix('/admin')->group(function () {
    Route::controller(BackendController::class)->group(function () {
        //_ Login _//
        Route::view('/', 'BackEnd.Pages.Login')->name('login.view');
        Route::post('/userLogin', 'Login');

        //_ Registration _//
        Route::view('/registration', 'BackEnd.Pages.Register')->name('regester.view');
        Route::post('/userRegistration', 'Register');

        Route::middleware(['tokenVerify'])->group(function () {
            //_ Pages _//
            Route::view('/home', 'BackEnd.Pages.Home');

            Route::get('/viewProfile', 'ViewProfile');
            Route::get('/logout', 'Logout')->name('log.out');
        });
    });
});
