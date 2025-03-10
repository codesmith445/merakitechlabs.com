<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/', [PostController::class, 'home'])->name('home');
Route::get('/search', [PostController::class, 'search'])->name('search');
Route::get('/about-us', [SiteController::class, 'about'])->name('about-us');
Route::get('/contact-us', [SiteController::class, 'contactUs'])->name('contact-us');
Route::get('/privacy-policy', [SiteController::class, 'privacyPolicy'])->name('privacy-policy');
Route::get('/terms-and-conditions', [SiteController::class, 'termsAndConditions'])->name('terms-and-conditions');
Route::get('/category/{category:slug}', [PostController::class, 'byCategory'])->name('by-category');
Route::get('/{post:slug}', [PostController::class, 'show'])->name('view');