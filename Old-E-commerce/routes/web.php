<?php

use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\Backend\BrandsController;
use App\Http\Controllers\Backend\CategoryController;
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
        // Route::view('/mail', 'Backend.Emails.PasswordRecoverOtp');

        // API
        Route::post('/sign-up', 'Signup');
        Route::post('/login', 'Login');
        Route::get('/logout', 'Logout')->name('logout')->middleware('JwtVerify');
        Route::post('/send-otp', 'SendOtp');
        Route::post('/verify-otp', 'VerifyOtp');
        Route::post('/update-password', 'UpdatePassword')->middleware('JwtVerify');
    });

    // Protected Route
    Route::controller(ProfileController::class)->group(function () {
        Route::middleware(['JwtVerify'])->group(function () {
            Route::view('/dashboard', 'Backend.Pages.Dashboard.Dashboard');
            Route::view('/profile', 'Backend.Pages.Dashboard.Profile')->name('profile.view');

            // API
            Route::get('/profile-data', 'ProfileData');
            Route::post('/update-profile', 'UpdateProfile');
            Route::post('/update-profile-pic', 'UpdateProfilePic')->name('update.profile.pic');
        });
    });

    Route::controller(CategoryController::class)->group(function () {
        Route::middleware(['JwtVerify'])->group(function () {
            Route::view('/categories', 'Backend.Pages.Dashboard.CategoryList')->name('category.view');

            // API
            Route::post('/create-category', 'CreateCategory');
            Route::get('/category-list', 'CategoryList');
            Route::post('/category-delete', 'CategoryDelete');
            Route::post('/category-edite', 'CategoryEdite');
        });
    });

    Route::controller(BrandsController::class)->group(function () {
        Route::middleware(['JwtVerify'])->group(function () {
            Route::view('/brands', 'Backend.Pages.Dashboard.BrandsList')->name('brands.view');

            // API
            Route::post('/create-brands', 'CreateBrands');
            Route::post('/brands-list', 'BrandsList');
            Route::post('/brands-delete', 'BrandsDelete');
            Route::post('/brands-edite', 'BrandsEdite');
        });
    });

    Route::controller(ProductController::class)->group(function () {
        Route::middleware(['JwtVerify'])->group(function () {
            Route::view('/products', 'Backend.Pages.Dashboard.ProductsList')->name('products.view');

            // API
            Route::post('/product-create', 'ProductCreate');
            Route::post('/product-list', 'ProductList');
            Route::post('/product-delete', 'ProductDelete');
            Route::post('/product-edite', 'ProductEdite');

            Route::get('/brands-list-for-product', 'BrandsListForProduct');
        });
    });

});