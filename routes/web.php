<?php

use Illuminate\Support\Facades\Route;

//public routes
Route::view('/', 'index')-> name('index');
Route::view('login', 'login')->name('login');
Route::view('register', 'register')->name('register');
Route::view('private', 'private')->name('private');

// Authenticated routes
Route::prefix('good')->group(function () {
    Route::view('create', 'good.create')->name('create');
    Route::view('read', 'good.read')->name('read');
    Route::view('update', 'good.update')->name('update');
    Route::view('delete', 'good.delete')->name('delete');
})->middleware('auth');
