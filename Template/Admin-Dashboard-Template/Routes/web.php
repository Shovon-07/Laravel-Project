<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BackEnd\BackEndController;

Route::get('/', function () {
    return view('welcome');
});

//___ Admin Panel ___//
Route::prefix('/admin')->group(function () {
    Route::controller(BackEndController::class)->group(function () {
        Route::get('/', 'Index');
        Route::get('/home', 'Home')->name('home.view');

        //___ Task Management ___//
        Route::get('/tasks', 'Tasks')->name('tasks.list');
    });
});
