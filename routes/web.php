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
})->middleware('auth')->name('add.article');

Route::get('/admin/list-article', function() {
    $articles = Article::latest()->paginate(10);

    return view('article.list-article', compact('articles'));
})->middleware('auth')->name('list.article');

Route::get('/admin/article-article', [ArticleController::class, 'searchTable'])
    ->middleware('auth')
    ->name('search.article-table');

Route::get('/about', function() {
    return view('about');
})->name('about');

Route::post('/feedback', [FeedbackController::class, 'store'])->name('feedback.post');

Route::controller(CatController::class)->group(function () {
    Route::get('/', 'index')->name('home');
    Route::get('/cat-edit/{cat}', 'edit')->middleware('auth')->name('cat.edit');
    Route::post('/cat-store', 'store')->middleware('auth')->name('cat.store');
    Route::put('/cat-update/{cat}', 'update')->middleware('auth')->name('cat.update');
    Route::delete('/delete/{cat}', 'destroy')->middleware('auth')->name('destroy.cat');
    Route::get('/admin', 'admin')->middleware('auth')->name('admin.home');
    Route::get('/gallery', 'gallery')->name('gallery');
    Route::get('/search', 'search')->name('search.get');
    Route::get('/search-table', 'searchTable')->name('search.table');
});

Route::controller(PartnerController::class)->group(function () {
    Route::get('/admin/list-partner', 'index')->middleware('auth')->name('list.partner');
    Route::get('/admin/add-partner', 'add')->middleware('auth')->name('add.partner');
    Route::post('/store-partner', 'store')->middleware('auth')->name('store.partner');
    Route::get('/show-partner/{partner}', 'show')->middleware('auth')->name('show.partner');
    Route::put('/update-partner/{partner}', 'update')->middleware('auth')->name('update.partner');
    Route::delete('/delete-partner/{partner}', 'destroy')->middleware('auth')->name('delete.partner');
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