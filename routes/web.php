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

Route::get('/', \App\Http\Controllers\Main::class)->name('home');
Route::get('/about', function () {
    return view('about');
})->name('about');
Route::get('/news/{id?}', \App\Http\Controllers\News::class)->name('news');

