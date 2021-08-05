<?php

namespace App\Http\Controllers;

use App\Models\User as ModelsUser;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\User;

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


}
