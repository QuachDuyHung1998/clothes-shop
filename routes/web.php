<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\Site\PageController;
use App\Http\Controllers\Site\SocialController;
use Illuminate\Support\Facades\Route;

// language
Route::get('/lang/{lang}', [LanguageController::class, 'change'])->name('lang');

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

// facebook
Route::get('auth/facebook', [SocialController::class, 'facebookRedirect'])->name('facebook_login');
Route::get('auth/facebook/callback', [SocialController::class, 'loginWithFacebook']);

Route::name('site.')->group(function () {
    // home
    Route::get('/', [PageController::class, 'home'])->name('home');
    // page
    Route::get('/{menu:url}', [PageController::class, 'page'])->name('page');
    //category
    Route::get('/categories/{category:slug}', [PageController::class, 'category'])->name('category');
});

Route::redirect('/admin', 'admin/dashboard');
Route::prefix('admin')->group(function () {
    Route::middleware(['admin'])->group(function () {
        Route::name('admin.')->group(function () {
            Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

            // category
            Route::get('/categories', [CategoryController::class, 'index'])->name('category');
        });
    });
});