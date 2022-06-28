<?php

use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\FeedbacksController;
use App\Http\Controllers\Admin\ParserController;
use App\Http\Controllers\Admin\ProfilesController;
use App\Http\Controllers\Admin\SourceController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\UserCabinetController;
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

Route::get('/feedbacks', [FeedbackController::class, 'get'])->name('feedbacks');
Route::post('/feedbacks', [FeedbackController::class, 'store'])->name('feedbacksStore');
Route::put('/feedbacks/{feedback}', [FeedbackController::class, 'update'])->name('feedbacksUpdate');
Route::delete('/feedbacks/{feedback}', [FeedbackController::class, 'destroy'])->name('feedbacksDestroy');

Route::get('/login', [LoginController::class, 'form'])->name('loginform');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::post('/registration', [LoginController::class, 'registration'])->name('registration');
Route::get('/registration', [LoginController::class, 'registrationForm'])->name('registrationform');
Route::get('/cabinet/{user_id}', [UserCabinetController::class, 'index'])->name('cabinet')->middleware('isaccess');
Route::put('/cabinet/{user_id}', [UserCabinetController::class, 'edit'])->name('useredit')->middleware('isaccess');

Route::resource('news', NewsController::class);

Route::group(['prefix' => 'admin', 'middleware' => 'isadmin'], function () {
    Route::get('/', [AdmMainController::class, 'index'])->name('main');
    Route::resource('categories', CategoriesController::class);
    Route::resource('feedbacks', FeedbacksController::class);
    Route::resource('profiles', ProfilesController::class);
    Route::resource('comments', CommentController::class);
    Route::resource('sources', SourceController::class);
    Route::resource('news', AdmNewsController::class)
        ->names([
            'index' => 'newsIndexA',
            'edit' => 'newsEditA',
            'update' => 'newsUpdateA',
            'destroy' => 'newsDestroyA',
            'store' => 'newsStoreA',
            'create' => 'newsCreateA',
        ]);
    Route::get('/parse', [ParserController::class, 'index'])->name('parser');
    Route::get('/startworker', [ParserController::class, 'startWorker'])->name('startWorker');
});

Route::get('/auth/{driver}/redirect', [SocialController::class, 'redirect'])
    ->where('driver', '\w+')
    ->name('social.redirect');
Route::any('/auth/{driver}/callback', [SocialController::class, 'callback'])
    ->where('driver', '\w+')
    ->name('social.callback');

