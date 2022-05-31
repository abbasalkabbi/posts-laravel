<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostsController;
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

Route::get('/',[PostsController::class,'index'])->name('home');

// show dashboard
Route::get('/dashboard',[DashboardController::class,"index"])->name('dashboard') ->middleware('auth');
// show posts
Route::get('/posts',[PostsController::class,'index'])->name('posts');
Route::post('/posts',[PostsController::class,'store']);
/**
 * login  
 * Register 
 * logout 
 */

// show login page
Route::get('/login',[LoginController::class,'index'])->name('login')->middleware('guest');
// form login
Route::post('/login',[LoginController::class,'login']);
// show page register
Route::get('/register',[RegisterController::class,'index'])->name("register")->middleware('guest');
// form register
Route::post('/register',[RegisterController::class,'store']);
// logout
Route::get('/logout',[LogoutController::class,'logout'])->name('logout');

