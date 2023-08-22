<?php

use App\Http\Controllers\GoodController;
use Illuminate\Support\Facades\Route;

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

Route::view('/', 'home.index')-> name('home');

Route::view('create', 'crud.create')->name('create');
Route::view('read', 'crud.read')->name('read');
Route::view('update', 'crud.update')->name('update');
Route::view('delete', 'crud.delete')->name('delete');

Route::view('register', 'register.index')->name('register');
Route::view('login', 'login.index')->name('login');


//Route::prefix('good')->group(callback: function () {
//    Route::get('/create', [GoodController::class, 'create'])->name('create');
//    Route::get('/read', [GoodController::class, 'show'])->name('read');
//    Route::get('/update', [GoodController::class, 'update'])->name('update');
//    Route::get('/delete', [GoodController::class, 'destroy'])->name('delete');
//});




