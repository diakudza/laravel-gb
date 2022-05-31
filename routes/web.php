<?php

use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\FeedbacksController;
use App\Http\Controllers\Admin\ProfilesController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\NewsController as AdmNewsController;
use App\Http\Controllers\Admin\MainController as AdmMainController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\FeedbackController;

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

Route::get('/', MainController::class)->name('home');
Route::get('/about', AboutController::class)->name('about');
Route::get('/feedback', [FeedbackController::class, 'get'])->name('feedback');
Route::post('/feedback', [FeedbackController::class, 'store'])->name('feedbackStore');

Route::get('/login', [LoginController::class, 'form'])->name('loginform');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::post('/registration', [LoginController::class, 'registration'])->name('registration');
Route::get('/registration', [LoginController::class, 'registrationForm'])->name('registrationform');

Route::resource('news', \App\Http\Controllers\NewsController::class);

Route::group(['prefix' => 'admin', 'middleware' => 'isadmin'], function () {
    Route::get('/', [AdmMainController::class, 'index'])->name('main');
    Route::resource('categories', CategoriesController::class);
    Route::resource('feedbacks', FeedbacksController::class);
    Route::resource('profiles', ProfilesController::class);
    Route::resource('news', AdmNewsController::class)
        ->names([
            'index' => 'new.index',
            'show' => 'new.show',
            'destroy' => 'new.destroy',
            'store' => 'new.store',
            'create' => 'new.create',
        ]);

});
