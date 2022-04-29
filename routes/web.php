<?php

use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\NewsController;
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

Route::get('/', \App\Http\Controllers\MainController::class)->name('home');
Route::get('/about', \App\Http\Controllers\AboutController::class)->name('about');
Route::resource('news',\App\Http\Controllers\NewsController::class);

Route::group(['prefix' => 'admin'], function (){
    Route::get('/',[MainController::class,'index'])->name('admin.main');
    Route::resource('news', NewsController::class);
});
