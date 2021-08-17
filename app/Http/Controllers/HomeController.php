<?php

namespace App\Http\Controllers;

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
        $this->banners = DB::table('components')
            ->where('divisi', 'Yayasan')
            ->where('bagian', 'banner')->get();

        return view('home.home')->with('banners',$this->banners);;
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
