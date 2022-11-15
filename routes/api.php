<?php

use App\Http\Controllers\Api\ArticleController;
use App\Http\Controllers\Api\AuthController;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

Route::controller(AuthController::class)->group(function () {
    Route::post('/signin', 'signin');
    Route::post('/signup', 'signup');
});

Route::group(['controller' => ArticleController::class], function () {
    Route::get('/articles', 'index');

    Route::middleware('auth:sanctum')->group(function () {
        Route::post('/articles/create', 'store');
        Route::patch('/articles/{article:id}', 'update');
        Route::delete('/articles/{article:id}', 'delete');
    });

    Route::get('/articles/{article:id}', 'show');
});
