<?php

use App\Http\Controllers\FrontController;
use Illuminate\Support\Facades\Route;

Route::get('/', [FrontController::class, 'index'])->name('front.index');
Route::get('/profile', [FrontController::class, 'profile'])->name('front.profile');
Route::get('/academic', [FrontController::class, 'academic'])->name('front.academic');
Route::get('/gallery', [FrontController::class, 'gallery'])->name('front.gallery');
Route::get('/contact', [FrontController::class, 'contact'])->name('front.contact');

Route::get('/details/{article_news:slug}', [FrontController::class, 'details'])->name('front.details');
Route::get('/category/{category:slug}', [FrontController::class, 'category'])->name('front.category');
Route::get('/author/{author:slug}', [FrontController::class, 'author'])->name('front.author');
Route::get('/search', [FrontController::class, 'search'])->name('front.search');
