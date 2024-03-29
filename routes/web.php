<?php

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

Route::get('/', [App\Http\Controllers\FrontController::class, 'index']);

Auth::routes();

Route::group(['middleware' => ['web', 'auth']], function() {
    Route::get('dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

    Route::get('profile', [App\Http\Controllers\UserController::class, 'profile'])->name('profile');
    Route::put('profile', [App\Http\Controllers\UserController::class, 'updateProfile'])->name('profile.update');
    Route::get('reviews', [App\Http\Controllers\UserReviewController::class, 'index'])->name('reviews');
    Route::post('reviews', [App\Http\Controllers\UserReviewController::class, 'create'])->name('reviews.create');
});
