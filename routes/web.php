<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('dashboard');

Route::get('/userdata', [App\Http\Controllers\AdminController::class, 'userData'])->name('userdata');

Route::get('/banner', [App\Http\Controllers\AdminController::class, 'banner'])->name('banner');

Route::get('/sambutan', [App\Http\Controllers\AdminController::class, 'sambutan'])->name('sambutan');

Route::get('/deskripsi-singkat', [App\Http\Controllers\AdminController::class, 'deskripsiSingkat'])->name('deskripsi-singkat');

Route::get('/brosur', [App\Http\Controllers\AdminController::class, 'brosur'])->name('brosur');

Route::get('/profile', [App\Http\Controllers\AdminController::class, 'profile'])->name('profile');

Route::get('/galeri', [App\Http\Controllers\AdminController::class, 'galeri'])->name('galeri');

Route::get('/blog', [App\Http\Controllers\AdminController::class, 'blog'])->name('blog');

Route::get('/kontak', [App\Http\Controllers\AdminController::class, 'kontak'])->name('kontak');

Route::get('/credits', [App\Http\Controllers\AdminController::class, 'credits'])->name('credits');
