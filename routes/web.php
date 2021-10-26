<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;


/*
|----------------------------------------------(----------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'signin'])->name('signin');

Route::get('/logout', [LoginController::class, 'signout']);

Route::get('/dashboard', [DashboardController::class,'index'])->name('dashboard')->middleware('auth');

Route::get('/register', [RegisterController::class,'index'])->name('register');
Route::post('/register',[RegisterController::class,'store'])->name(('register'));

Route::get('/posts', [PostController::class, 'index'])->name('posts');
Route::post('/posts',[PostController::class, 'submit']);
Route::get('/', function () {
    return view('index');
});
