<?php

use App\Http\Controllers\Web\AuthController;
use App\Http\Controllers\Web\IndexController;
use App\Http\Middleware\AdminAuthMiddleware;
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

Route::controller(AuthController::class)->as('auth.')->group(function () {
    Route::post('/signin', 'signin')->name('signin');
    Route::post('/signup', 'signup')->name('signup');
    Route::post('/logout', 'logout')->name('logout');
});

Route::controller(IndexController::class)->as('page.')->group(function () {
    Route::middleware(['auth', AdminAuthMiddleware::class])->get('/admin-panel', 'videos')->name('articles');
    Route::get('/signin', 'signin')->name('signin');
    Route::get('/signup', 'signup')->name('signup');
    Route::get('/logout', 'logout')->name('logout');
});
