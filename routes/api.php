<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoodController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

//Auth routes
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.post')->middleware('web');
Route::post('/register', [RegisterController::class, 'register'])->name('register.post')->middleware('web');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('web');

//Goods crud routes
Route::prefix('good')->group(function () {
    Route::post('create', [GoodController::class, 'create'])->name('create.action')->middleware('web');
    Route::post('read', [GoodController::class, 'show'])->name('read.action')->middleware('web');
    Route::post('update', [GoodController::class, 'update'])->name('update.action')->middleware('web');
    Route::post('delete', [GoodController::class, 'destroy'])->name('delete.action')->middleware('web');
})->middleware('auth');
