<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $banners = DB::table('components')
            ->where('divisi', 'Yayasan')
            ->where('bagian', 'banner')->get();

        $sambutan = DB::table('components')
            ->where('divisi', 'Yayasan')
            ->where('bagian', 'sambutan')->first();

        $deskripsi = DB::table('components')
            ->where('divisi', 'Yayasan')
            ->where('bagian', 'deskripsi-singkat')->first();

        $brosur = DB::table('components')
            ->where('divisi', 'Yayasan')
            ->where('bagian', 'brosur')->get();
        
        // $posts = DB::table('posts')
        //     ->where('is_published', 1)
        //     ->orderBy('created_at', 'desc')
        //     ->paginate(3);

        $posts = Posts::all()
            ->where('is_published', 1)
            ->sortByDesc('created_at')
            ->take(3);

        // dd($posts);

        return view('home.home', compact('banners','sambutan','deskripsi','brosur','posts'));
    }

    public function profile()
    {
        return view('home.profile');
    }

    public function program()
    {
        return view('home.pendidikan-program');
    }
    
    public function galeri()
    {
    $yt = DB::table('components')
        ->where('divisi', 'yayasan')
        ->where('bagian', 'youtube')->first();
        
        return view('home.galeri', compact('yt'));
    }

    public function blog()
    {
        return view('home.blog');
    }

    public function kontak()
    {
        return view('home.kontak');
    }

    public function donasi()
    {
        return view('home.donasi');
    }

    public function pendaftaran()
    {
        return view('home.pendaftaran');
    }
}
