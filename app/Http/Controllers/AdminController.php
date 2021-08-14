<?php

namespace App\Http\Controllers;

use App\Models\Component;
use App\Models\User as ModelsUser;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Traits\HasRoles;

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

    public function userdata()
    {
        $roles = Role::all();
        $users = ModelsUser::with('roles')->get();
        $nonmembers = $users->reject(function ($user, $key) {
            return $user->hasRole('superadmin');
        });

        return view('admin.userdata', ['nonmembers' => $nonmembers]);
    }

    public function banner()
    {        
        $this->banners = DB::table('components')
            ->where('divisi', session('divisi'))
            ->where('bagian', 'banner')->get();

        return view('admin.banner')
            ->with('banners',$this->banners);
    }
    
    public function sambutan()
    {
        $this->sambutan = DB::table('components')
            ->where('divisi', session('divisi'))
            ->where('bagian', 'sambutan')->first();

        // dd($this->sambutan);
        return view('admin.sambutan')
            ->with('sambutan',$this->sambutan);
    }

    public function deskripsiSingkat()
    {
        $this->deskripsi = DB::table('components')
            ->where('divisi', session('divisi'))
            ->where('bagian', 'deskripsi-singkat')->first();

        return view('admin.deskripsi')
            ->with('deskripsi',$this->deskripsi);
    }

    public function brosur()
    {
        $this->brosur = DB::table('components')
            ->where('divisi', session('divisi'))
            ->where('bagian', 'brosur')->get();

        // dd($this->brosur);
        return view('admin.brosur')
            ->with('brosur',$this->brosur);
    }

    public function profile()
    {
        $tentang = DB::table('components')
            ->where('divisi', session('divisi'))
            ->where('bagian', 'tentang')->first();
        
        // dd($tentang);
        
        $visi = DB::table('components')
            ->where('divisi', session('divisi'))
            ->where('bagian', 'visi')->first();

        $misi = DB::table('components')
            ->where('divisi', session('divisi'))
            ->where('bagian', 'misi')->first();


        // dd($this->profil);

        return view('admin.profile', compact('tentang','visi','misi'));
    }

    public function galeri()
    {
        return view('admin.galeri');
    }

    public function kontak()
    {
        $this->brosur = DB::table('components')
            ->where('divisi', session('divisi'))
            ->where('bagian', 'kontak')->get();
        // dd($this->brosur());
        return view('admin.kontak');
    }

    public function credits()
    {
        return view('admin.credits');
    }
}
