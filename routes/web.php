<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ComponentController;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/profile', [HomeController::class, 'profile'])->name('userprofile');
Route::get('/program-pendidikan', [HomeController::class, 'program'])->name('pogram-pendidikan');
Route::get('/galeri', [HomeController::class, 'galeri'])->name('usergaleri');
Route::get('/blog', [HomeController::class, 'blog'])->name('userblog');
Route::get('/kontak', [HomeController::class, 'kontak'])->name('userkontak');
Route::get('/wakaf', [HomeController::class, 'donasi'])->name('wakaf');
Route::get('/pendaftaran', [HomeController::class, 'pendaftaran'])->name('pendaftaran');
Route::get('/blog/{slug}', [HomeController::class, 'blog_post'])->name('blog_post');
Route::get('/blog/tags/{tag}', [HomeController::class, 'posts_tag'])->name('posts_tag');
Route::get('/search', [HomeController::class, 'posts_search'])->name('posts_search');
Route::get('/wakaf/checkout', [HomeController::class, 'checkout_donasi'])->name('wakaf_bayar');
Route::get('/wakaf/add', [HomeController::class, 'simpan_donasi'])->name('wakaf_save');
Route::get('/download', [HomeController::class, 'download'])->name('download');

// Route::get('/admin',[AdminController::class, 'index'])->name('dashboard');

Auth::routes();

Route::get('/admin',[AdminController::class, 'index'])->name('dashboard');

// Route::middleware('role:superadmin')->resource('admin/userdata',UserController::class)->names([
//     'index' => 'userdata',
// ]);

Route::middleware('role:superadmin')->prefix('admin')->group(function(){
    Route::get('userdata/getuser',[UserController::class, 'get_user'])->name('get_user');
    Route::resource('userdata', UserController::class)->names([
        'index' => 'userdata',
    ]);
});

Route::middleware('auth')->get('admin-select', [AdminController::class, 'select_admin']);

Route::middleware('role:admin_yys')->get('admin/wakaf', [AdminController::class, 'wakaf'])->name('datawakaf');

Route::middleware('role:superadmin|admin_yys|admin_ra|admin_tka|admin_mts|admin_ma|admin_pst')->prefix('admin')->group(function(){
    Route::get('/akun',[AdminController::class, 'edit_user'])->name('editUser');
    Route::get('/akun/validate',[AdminController::class, 'pass_validate'])->name('validatepass');
    Route::put('/akun/{id}',[AdminController::class, 'update_akun'])->name('akunupdate');
});
Route::middleware('role:admin_yys|admin_ra|admin_tka|admin_mts|admin_ma|admin_pst')->prefix('admin')->group(function(){
    Route::get('/banner', [AdminController::class, 'banner'])->name('banner');
    Route::get('/sambutan', [AdminController::class, 'sambutan'])->name('sambutan');
    Route::get('/deskripsi-singkat', [AdminController::class, 'deskripsiSingkat'])->name('deskripsi-singkat');
    Route::get('/brosur', [AdminController::class, 'brosur'])->name('brosur');
    Route::get('/profile', [AdminController::class, 'profile'])->name('profile');
    Route::get('/galeri', [AdminController::class, 'galeri'])->name('galeri');
    Route::get('/kontak', [AdminController::class, 'kontak'])->name('kontak');
    Route::get('/credits', [AdminController::class, 'credits'])->name('credits');
    Route::get('/file', [AdminController::class, 'file'])->name('filemanager');
    
    // Blog Route
    Route::resource('blog', BlogController::class)->names([
        'index' => 'blog',
    ]);
    Route::post('/blog/add_tag',[BlogController::class, 'add_tag'])->name('newtag');
    Route::delete('/blog/del_tag/{id}',[BlogController::class, 'del_tag'])->name('deltag');
    Route::get('/blog/preview/{slug}',[BlogController::class, 'blog_preview'])->name('blog_preview');
    
    
    Route::prefix('banner')->group(function(){
        Route::post('/add_banner',[ComponentController::class, 'add_banner'])->name('newbanner');
        Route::put('/update_banner/{id}',[ComponentController::class, 'update_banner'])->name('editbanner');
        Route::delete('/del_banner/{id}',[ComponentController::class, 'delete_banner'])->name('delbanner');
    });

    Route::put('/update_sambutan/{id}',[ComponentController::class, 'update_sambutan'])->name('editsambutan');
    Route::put('/update_deskripsi/{id}',[ComponentController::class, 'update_deskripsi'])->name('editdesc');

    Route::prefix('brosur')->group(function(){
        Route::post('/add_brosur',[ComponentController::class, 'add_brosur'])->name('newbrosur');
        Route::put('/update_brosur/{id}',[ComponentController::class, 'update_brosur'])->name('editbrosur');
        Route::delete('/del_brosur/{id}',[ComponentController::class, 'delete_brosur'])->name('delbrosur');
    });

    Route::put('/update_tentang/{id}',[ComponentController::class, 'update_tentang'])->name('edittentang');
    Route::put('/update_visi/{id}',[ComponentController::class, 'update_visi'])->name('editvisi');
    Route::put('/update_misi/{id}',[ComponentController::class, 'update_misi'])->name('editmisi');

    Route::prefix('profil')->group(function(){
        Route::post('/add_kontak',[ComponentController::class, 'add_kontak'])->name('addkontak');
        Route::put('/edit_kontak/{id}',[ComponentController::class, 'update_kontak'])->name('editkontak');
        Route::get('/get_kontak',[ComponentController::class, 'edit_kontak'])->name('getkontak');
        Route::delete('/del_kontak/{id}',[ComponentController::class, 'delete_kontak'])->name('delkontak');
    });

    Route::prefix('galeri')->group(function(){
        Route::post('/add_galeri',[ComponentController::class, 'add_galeri'])->name('newgaleri');
        Route::put('/update_galeri/{id}',[ComponentController::class, 'update_galeri'])->name('editgaleri');
        Route::get('/get_galeri',[ComponentController::class, 'edit_galeri'])->name('getgaleri');
        Route::delete('/del_galeri/{id}',[ComponentController::class, 'delete_galeri'])->name('delgaleri');
    });

    Route::put('/update_yt/{id}',[ComponentController::class, 'update_yt'])->name('edityt');    
    Route::put('/update_yt_link/{id}',[ComponentController::class, 'single_yt'])->name('editsingleyt');    
    Route::put('/update_sett_galeri/{id}',[ComponentController::class, 'setting_galeri'])->name('editgalerisett');    

    Route::prefix('file')->group(function(){
        Route::post('/add_file',[ComponentController::class, 'add_file'])->name('newfile');
        Route::put('/update_file/{id}',[ComponentController::class, 'update_file'])->name('editfile');
        Route::get('/get_file',[ComponentController::class, 'edit_file'])->name('getfile');
        Route::delete('/del_file/{id}',[ComponentController::class, 'delete_file'])->name('delfile');
    });
});


