<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainPageController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ArticleController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Main Page Route
Route::get('/', [MainPageController::class, 'index']);
Route::get('/project-details/{id}', [MainPageController::class, 'projectDetails']);
Route::get('/project-lists/{category}', [MainPageController::class, 'projectLists']);
Route::get('/allproject-lists', [MainPageController::class, 'allProjectLists']);
Route::get('/about', [MainPageController::class, 'about'])->name('merakitech.about');
Route::get('/free-ebook', [MainPageController::class, 'freeEbook']);


// Articles Main Page Route
Route::get('/articles/article-user-view', [ArticleController::class, 'articleUserView'])->name('articles.article-user-view');
Route::get('/article-content-details/{id}', [ArticleController::class, 'articleDetails']);
Route::get('/articlelists/{category}', [ArticleController::class, 'articleLists']);

// Login Route
Route::get('/loginView', [AdminController::class, 'loginView'])->name('admin.loginView');
Route::post('/loginAttempt', [AdminController::class, 'loginAttempt'])->name('admin.loginAttempt');
Route::group(['middleware' => 'auth:admin'], function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::post('/logout', [AdminController::class, 'logout'])->name('admin.logout');
    Route::post('/store', [PostController::class, 'store'])->name('admin.store');
    Route::get('/fetch-php-data', [PostController::class, 'fetchData']);
    Route::get('/fetch-data/{id}', [PostController::class, 'fetchData']);
    Route::get('/fetch-javascript-data', [PostController::class, 'fetchData']);
    Route::post('/update/{id}', [PostController::class, 'update'])->name('admin.update');
    Route::delete('/delete/{id}', [PostController::class, 'destroy'])->name('admin.destroy');
    Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');
});


// PHP Language Route
