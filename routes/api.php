<?php

use App\Http\Controllers\API\ActionLogConetroller;
use App\Http\Controllers\API\ApiController;
use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\PostController;
use App\Http\Controllers\API\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::controller(ApiController::class)->group(function () {
    Route::prefix('admin')->group(function () {
        Route::post('register', 'register');
        Route::post('login', 'login')->name('admin.login');
    });
});

// Route::middleware('auth:sanctum')->group(function () {
Route::controller(ApiController::class)->group(function () {
    Route::get('logout', 'logout');
});
Route::controller(UserController::class)->group(function () {
    Route::get('user_list', 'user_list');
});
Route::controller(CategoryController::class)->group(function () {
    Route::get('category_list', 'category_list')->name('category_list');
    Route::post('search_category', 'search_category');
});
Route::controller(PostController::class)->group(function () {
    Route::get('post_list', 'post_list');
    Route::post('post_details', 'post_details');
});
// });

Route::controller(ActionLogConetroller::class)->group(function () {
    Route::post('action_log', 'action_log');
});
