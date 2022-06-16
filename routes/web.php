<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ListController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TrendPostController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    // Admin Profile
    Route::controller(ProfileController::class)->group(function () {
        Route::get('dashboard', 'index')->name('dashboard');
        Route::post('dashboard/{id}', 'update_admin')->name('update_admin');
        Route::get('change_password', 'change_password')->name('change_password');
        Route::post('update_password', 'update_password')->name('update_password');
    });
    // Route name("admin.")
    Route::name('admin.')->group(function () {
        // Admin List
        Route::prefix('admin')->group(function () {
            Route::controller(ListController::class)->group(function () {
                Route::get('list', 'index')->name('list');
                Route::get('search_admin', 'search_admin')->name('search_admin');
                Route::get('delete_admin/{id}', 'delete_admin')->name('delete_admin');
            });
        });
        // Category
        Route::controller(CategoryController::class)->group(function () {
            Route::get('category', 'index')->name('category');
            Route::get('add_category', 'add_category_page')->name('add_category_page');
            Route::post('add_category', 'add_category')->name('add_category');
            Route::get('delete_category/{id}', 'delete_category')->name('delete_category');
            Route::get('search_category', 'search_category')->name('search_category');
            Route::get('category/{id}', 'edit_category_page')->name('edit_category_page');
            Route::post('edit_category/{id}', 'edit_category')->name('edit_category');
        });
        // Post
        Route::controller(PostController::class)->group(function () {
            Route::get('post', 'index')->name('post');
            Route::get('add_post', 'add_post_page')->name('add_post_page');
            Route::post('add_post', 'add_post')->name('add_post');
            Route::get('edit_post_page/{id}', 'edit_post_page')->name('edit_post_page');
            Route::post('edit_post_page/{id}', 'edit_post')->name('edit_post');
            Route::get('search_post', 'search_post')->name('search_post');
            Route::get('delete_post/{id}', 'delete_post')->name('delete_post');
        });
        // TrendPost
        Route::controller(TrendPostController::class)->group(function () {
            Route::get('trend_post', 'index')->name('trend_post');
        });
    });

});
