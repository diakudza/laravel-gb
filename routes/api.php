<?php

use App\Http\Controllers\Api\NewsController;
use \App\Http\Controllers\Api\FeedbackController;
use App\Http\Controllers\Api\ApiLoginController;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\UsersController;
use Illuminate\Http\Request;
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
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/profile', [ProfileController::class, 'get']);
    Route::get('/users', [UsersController::class, 'getAll']);
    Route::get('/user/{id}', [UsersController::class, 'getUser']);
    Route::put('/profile', [ProfileController::class, 'put']);
    Route::get('/me', [ApiLoginController::class, 'me']);
});

Route::post('/logout', [ApiLoginController::class, 'logout']);
Route::get('/news', [NewsController::class, 'get']);
Route::get('/feedback', [FeedbackController::class, 'get']);
Route::delete('/news', [NewsController::class, 'delete']);
Route::post('/login', [ApiLoginController::class, 'login']);

