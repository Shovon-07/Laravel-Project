<?php

use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\ProductController;
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
    Route::controller(AuthController::class)->group(function () {
        Route::view('/', 'Backend.Pages.Auth.Login')->name('login');
        Route::view('/sign-up', 'Backend.Pages.Auth.Signup')->name('signup.view');
        Route::view('/forgot-password', 'Backend.Pages.Auth.RecoverPass')->name('forgotpass.view');
        Route::view('/verify-otp', 'Backend.Pages.Auth.OtpVerify');
        Route::view('/update-password', 'Backend.Pages.Auth.UpdatePass')->middleware('JwtVerify');

        // API
        Route::post('/sign-up', 'Signup');
        Route::post('/login', 'Login');
        Route::get('/logout', 'Logout')->name('logout')->middleware('JwtVerify');
        Route::post('/send-otp', 'SendOtp');
        Route::post('/verify-otp', 'VerifyOtp');
        Route::post('/update-password', 'UpdatePassword')->middleware('JwtVerify');
    });

    Route::controller(ProfileController::class)->group(function () {
        Route::middleware(['JwtVerify'])->group(function () {
            Route::view('/profile', 'Backend.Pages.Dashboard.Profile')->name('profile.view');

            // API
            Route::get('/profile-data', 'ProfileData');
            Route::post('/update-profile', 'UpdateProfile');
            Route::post('/update-profile-pic', 'UpdateProfilePic');
        });
    });

    Route::controller(DashboardController::class)->group(function () {
        Route::middleware(['JwtVerify'])->group(function () {
            Route::view('/dashboard', 'Backend.Pages.Dashboard.Dashboard');
            Route::view('/brands', 'Backend.Pages.Dashboard.BrandPage');
            Route::view('/categories', 'Backend.Pages.Dashboard.CategoryPage');
            Route::view('/products', 'Backend.Pages.Dashboard.ProductPage');
        });
    });

    Route::controller(CategoryController::class)->group(function () {
        Route::middleware(['JwtVerify'])->group(function () {
            // API
            Route::get('/category-list', 'CategoryList');
            Route::post('/category-by-id', 'CategoryById');
            Route::post('/create-category', 'CreateCategory');
            Route::post('/category-delete', 'CategoryDelete');
            Route::post('/category-edit', 'CategoryEdite');
        });
    });

    Route::controller(BrandController::class)->group(function () {
        Route::middleware(['JwtVerify'])->group(function () {
            // API 
            Route::get('/brand-list', 'BrandList');
            Route::post('/brand-by-id', 'BrandById');
            Route::post('/brand-create', 'BrandCreate');
            Route::post('/brand-delete', 'BrandDelete');
            Route::post('/brand-edite', 'BrandEdite');
        });
    });

    Route::controller(ProductController::class)->group(function () {
        Route::middleware(['JwtVerify'])->group(function () {
            // API
            Route::get('/product-list', 'ProductList');
            Route::post('/product-by-id', 'ProductById');
            Route::post('/product-create', 'ProductCreate');
            Route::post('/product-delete', 'ProductDelete');
            Route::post('/product-edite', 'ProductEdite');

            // Route::get('/brands-list-for-product', 'BrandsListForProduct');
        });
    });

});
