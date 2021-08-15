<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return view('home.home');
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
        return view('home.galeri');
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
