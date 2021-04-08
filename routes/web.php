<?php

use App\Http\Controllers\Admin\AjaxController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
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

            // ajax
            Route::prefix('ajax')->group(function () {
                Route::post('clear-cache', [AjaxController::class, 'clearCache']);
                // category
                Route::post('update-status-category', [AjaxController::class, 'updateStatusCategory']);
                Route::get('new-category', [AjaxController::class, 'viewNewCategory'])->name('ajax.new_category');
                Route::post('new-category', [AjaxController::class, 'newCategory']);
                Route::get('edit-category/{id}', [AjaxController::class, 'viewEditCategory'])->name('ajax.edit_category');
                Route::post('edit-category', [AjaxController::class, 'editCategory']);
            });

            // category
            Route::prefix('categories')->group(function () {
                Route::get('/', [CategoryController::class, 'index'])->name('category');
                Route::get('/delete/{id}', [CategoryController::class, 'destroy'])->name('category.delete');
            });

            // product
            Route::prefix('products')->group(function () {
                Route::get('/', [ProductController::class, 'index'])->name('product');
                Route::get('/create', [ProductController::class, 'create'])->name('product.create');
                Route::post('/create', [ProductController::class, 'store']);
                Route::get('/edit', [ProductController::class, 'edit'])->name('product.edit');
                Route::post('/edit', [ProductController::class, 'update']);
                Route::get('/delete/{id}', [ProductController::class, 'destroy'])->name('product.delete');
            });
        });
    });
});