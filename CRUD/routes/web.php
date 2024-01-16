<?php

use App\Http\Controllers\MyController;
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

Route::prefix('/')->group(function () {
    Route::view('/', 'Backend.Pages.Auth.Login');
    Route::view('/dashboard', 'Backend.Pages.Dashboard.Dashboard');

    Route::controller(MyController::class)->group(function () {
        Route::get('/getdata', 'GetData');
    });
});
