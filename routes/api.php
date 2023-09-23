<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\LikesController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\NotificationsController;
use App\Http\Controllers\FollowsController;





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

// Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::middleware('auth:api')->prefix('v1/api/')->group(function () {
    // users routes
    Route::get('users/profile', [UsersController::class, 'index'])->name('userprofile.index');
    Route::post('users/profile', [UsersController::class, 'store'])->name('userprofile.store');
    Route::put('user/profile/{id}', [UsersController:: class, 'update'])->name('userprofile.update');
    Route::delete('user/profile/{id}', [UsersController::class, 'destroy'])->name('userprofile.destroy');

    // posts Routes
    Route::get('posts', [PostsController::class, 'index'])->name('posts.index');
    Route::post('posts', [PostsController::class, 'store'])->name('posts.store');
    Route::get('posts/{id}', [PostsController::class, 'show'])->name('posts.show');
    Route::put('posts/{id}', [PostsController::class, 'update'])->name('posts.update');
    Route::delete('posts/{id}', [PostsController::class, 'destroy'])->name('posts.destroy');

    // Comments Routes
    Route::get('comments', [CommentsController::class, 'index'])->name('comments.index');
    Route::post('comments', [CommentsController::class, 'store'])->name('comments.store');
    Route::get('comments/{id}', [CommentsController::class, 'show'])->name('comments.show');
    Route::put('comments/{id}', [CommentsController::class, 'update'])->name('comments.update');
    Route::delete('comments/{id}', [CommentsController::class, 'destroy'])->name('comments.destroy');

    // Likes Routes
    Route::post('likes', [LikesController::class, 'store'])->name('likes.store');
    Route::delete('likes/{id}', [LikesController::class, 'destroy'])->name('likes.destroy');

    // Follows Routes
    Route::post('follows', [FollowsController::class, 'store'])->name('follows.store');
    Route::delete('follows/{id}', [FollowsController::class, 'destroy'])->name('follows.destroy');

    // Notifications Routes
    Route::get('notifications', [NotificationsController::class, 'index'])->name('notifications.index');
    Route::post('notifications', [NotificationsController::class, 'store'])->name('notifications.store');
    Route::get('notifications/{id}', [NotificationsController::class, 'show'])->name('notifications.show');
    Route::delete('notifications/{id}', [NotificationsController::class, 'destroy'])->name('notifications.destroy');
});

Route::prefix('v1/api/')->group(function () {
    // Authentication Routes
    Route::post('auth/signup', [AuthController::class, 'signup'])->name('user.signup');
    Route::post('auth/login', [AuthController::class, 'login'])->name('user.login');
    Route::post('auth/logout', [AuthController::class, 'logout'])->name('user.logout');
    Route::post('auth/password/reset', [AuthController::class, 'resetPassword'])->name('user.resetpassword');
});