<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ComponentController;

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

Route::get('/home', [HomeController::class, 'index'])->name('home');
// Route::get('/admin',[AdminController::class, 'index'])->name('dashboard');


Route::get('/admin',[AdminController::class, 'index'])->name('dashboard');

Route::middleware('role:superadmin')->get('admin/userdata',[AdminController::class, 'userdata'])->name('userdata');


Route::middleware('role:admin_yys|admin_ra|admin_tka|admin_mts|admin_ma|admin_pst')->prefix('admin')->group(function(){
    Route::get('/banner', [AdminController::class, 'banner'])->name('banner');
    Route::get('/sambutan', [AdminController::class, 'sambutan'])->name('sambutan');
    Route::get('/deskripsi-singkat', [AdminController::class, 'deskripsiSingkat'])->name('deskripsi-singkat');
    Route::get('/brosur', [AdminController::class, 'brosur'])->name('brosur');
    Route::get('/profile', [AdminController::class, 'profile'])->name('profile');
    Route::get('/galeri', [AdminController::class, 'galeri'])->name('galeri');
    // Route::get('/blog', [AdminController::class, 'blog'])->name('blog');
    Route::get('/kontak', [AdminController::class, 'kontak'])->name('kontak');
    Route::get('/credits', [AdminController::class, 'credits'])->name('credits');
    Route::resource('blog', BlogController::class)->names([
        'index' => 'blog',
    ]);
    Route::post('/blog/add_tag',[BlogController::class, 'add_tag'])->name('newtag');
    Route::delete('/blog/del_tag/{id}',[BlogController::class, 'del_tag'])->name('deltag');
    
    Route::prefix('banner')->group(function(){
        Route::post('/add_banner',[ComponentController::class, 'add_banner'])->name('newbanner');
        Route::put('/update_banner/{id}',[ComponentController::class, 'update_banner'])->name('editbanner');
        Route::delete('/del_banner/{id}',[ComponentController::class, 'delete_banner'])->name('delbanner');
    });
});