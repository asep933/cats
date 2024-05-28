<?php

use App\Http\Controllers\CatController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\FeedbackController;
use Illuminate\Support\Facades\Route;

Route::controller(CatController::class)->group(function () {
    Route::get('/', 'index')->name('home');
    Route::post('/cat-store', 'store')->name('cat.store');
    Route::delete('/cat-destroy', 'destroy');

    Route::get('/admin', 'admin')->name('admin.home')->middleware('auth');
    Route::get('/gallery', 'gallery')->name('gallery');
});

Route::controller(PartnerController::class)->group(function () {
    Route::post('/store-partner', 'store')->name('store.partner');
});
Route::get('/about', function() {
    return view('about');
})->name('about');
Route::get('/login', function () {
    return view('login');
})->name('login')->middleware('guest');

Route::get('/login-post', [LoginController::class, 'loginPost'])->name('login.post');
Route::post('/feedback', [FeedbackController::class, 'store'])->name('feedback.post');
Route::get('/search', [CatController::class, 'search'])->name('search.get');