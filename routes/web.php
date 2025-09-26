<?php

use Illuminate\Support\Facades\Route;

Route::get('/', fn () => view('home'))->name('home');
Route::get('/edukasi', fn () => view('educate'))->name('edukasi');
Route::get('/tentang', fn () => view('about'))->name('tentang');
