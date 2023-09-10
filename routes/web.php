<?php

use App\Http\Controllers\GoodController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
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

Route::view('/', 'index')-> name('index');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.post');
Route::post('/register', [RegisterController::class, 'register'])->name('register.post');

Route::name('user.')->group(function (){
    Route::view('/private', 'private')->middleware('auth')->name('private');
    Route::get('/login', function (){
        if (Auth::check()) {
           return redirect(route('user.private'));
        }
       return view('login');
    })->name('login');
    Route::get('/register', function (){
        if (Auth::check()) {
            return redirect(route('user.private'));
        }
        return view('register');
    })->name('register');
});

Route::view('create', 'good.create')->name('create');
Route::view('read', 'good.read')->name('read');
Route::view('update', 'good.update')->name('update');
Route::view('delete', 'good.delete')->name('delete');

Route::view('register', 'register')->name('register');
Route::view('login', 'login')->name('login');

Route::prefix('good')->group(function () {
    Route::post('create', [GoodController::class, 'create'])->name('create.action');
    Route::post('read', [GoodController::class, 'read'])->name('read.action');
    Route::post('update', [GoodController::class, 'update'])->name('update.action');
    Route::post('delete', [GoodController::class, 'delete'])->name('delete.action');
});
