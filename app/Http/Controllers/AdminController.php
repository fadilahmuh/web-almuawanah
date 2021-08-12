<?php

namespace App\Http\Controllers;

use App\Models\User as ModelsUser;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Auth;
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

        // dd($users);
        // dd($nonmembers);
        // return view('admin.report_roles', ['roles'=>$roles, 'nonmembers' => $nonmembers]);
        return view('admin.userdata', ['nonmembers' => $nonmembers]);
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
