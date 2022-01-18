<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/post/save', [App\Http\Controllers\HomeController::class, 'savePostToBd'])->name('save-post');
Route::get('/user/save', [App\Http\Controllers\HomeController::class, 'saveUserToBd'])->name('save-user');
Route::resource('post', PostController::class)->middleware('auth');
Route::resource('user', UserController::class)->middleware('auth');
Route::get('/user/{user}/post', [App\Http\Controllers\UserController::class, 'show'])->name('user-post');


