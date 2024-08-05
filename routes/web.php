<?php

use App\Http\Controllers\CatController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\ArticleController;
use App\Models\Article;
use Illuminate\Support\Facades\Route;

Route::get('/admin/add-article', function() {
    return view('article.store');
})->name('add.article');

Route::get('/admin/list-article', function() {
    $articles = Article::latest()->paginate(10);

    return view('article.list-article', compact('articles'));
})->name('list.article');

Route::get('/admin/article-article', [ArticleController::class, 'searchTable'])->name('search.article-table');

Route::get('/about', function() {
    return view('about');
})->name('about');

Route::post('/feedback', [FeedbackController::class, 'store'])->name('feedback.post');


Route::controller(CatController::class)->group(function () {
    Route::get('/', 'index')->name('home');
    Route::post('/cat-store', 'store')->name('cat.store');
    Route::delete('/cat-destroy', 'destroy');

    Route::get('/admin', 'admin')->name('admin.home')->middleware('auth');
    Route::get('/gallery', 'gallery')->name('gallery');
    Route::get('/search', 'search')->name('search.get');
    Route::get('/search-table', 'searchTable')->name('search.table');
});

Route::controller(PartnerController::class)->group(function () {
    Route::get('/admin/list-partner', 'index')->name('list.partner');
    Route::get('/admin/add-partner', 'add')->name('add.partner');
    Route::post('/store-partner', 'store')->name('store.partner');
    Route::get('/admin/search-partner', 'searchTable')->name('search.partner-table');
});

Route::middleware('guest')->group(function() {
    Route::get('/login', function() {
        return view('login');
    })->name('login');
});

Route::controller(AuthController::class)->group(function() {
    Route::post('/register', 'register')->middleware('guest')->name('auth.register');
    Route::post('/login-post', 'loginPost')->middleware('guest')->name('auth.login');
    Route::delete('/logout', 'logout')->middleware('auth')->name('auth.logout');
});

Route::resource('article', ArticleController::class);