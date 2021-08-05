<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.dashboard');
    }

    public function userData()
    {
        return view('admin.userdata');
    }

    public function banner()
    {
        return view('admin.banner');
    }
    
    public function sambutan()
    {
        return view('admin.sambutan');
    }

    public function deskripsiSingkat()
    {
        return view('admin.deskripsi');
    }

    public function brosur()
    {
        return view('admin.brosur');
    }

    public function profile()
    {
        return view('admin.profile');
    }

    public function galeri()
    {
        return view('admin.galeri');
    }

    public function blog()
    {
        return view('admin.blog');
    }

    public function kontak()
    {
        return view('admin.kontak');
    }

    public function credits()
    {
        return view('admin.credits');
    }
}
