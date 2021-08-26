<?php

namespace App\Http\Controllers;

use App\Models\Component;
use App\Models\User;
use App\Models\User as ModelsUser;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Facades\Validator;

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
        $this->galeri = DB::table('components')
            ->where('divisi', session('divisi'))
            ->where('bagian', 'galeri')->get();
        
        $yt = DB::table('components')
            ->where('divisi', session('divisi'))
            ->where('bagian', 'youtube')->first();

        return view('admin.galeri', compact('yt'))->with('galeri',$this->galeri);
    }

    public function kontak()
    {
        $this->kontak = DB::table('components')
            ->where('divisi', session('divisi'))
            ->where('bagian', 'kontak')->get();

        return view('admin.kontak')->with('kontak',$this->kontak);
    }

    public function credits()
    {
        return view('admin.credits');
    }

    public function edit_user()
    {
        $user = Auth::user();
        return view('admin.edit_user',compact('user'));
    }

    public function pass_validate(Request $request)
    {
        if(Hash::check( $request->password, Auth::user()->password)){
            $status = 'Accepted';
        } else {
            $status = 'Refused';
        }

        return response()->json([
            'result' => $status,
        ]);
    }

    public function update_akun(Request $request, $id)
    {
        $old_user = User::findorfail($id);
        // dd($request);       

        $rules = array(
            'password' => 'confirmed',
        );  
        if (isset($request->name)) {
            $rules['name'] = 'required';
            $rules['no_hp'] = 'numeric';
        }
       
        // dd($rules) ;
        $messages = array(
            'name.required' => 'Form Nama tidak boleh kosong!',
            'password.confirmed' => 'Password tidak sama! ',
            'no_hp.numeric' => 'Nomor tidak valid!!'
        );

        $request->all();
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        } else {
            $old_user->update([
                'name' => isset($request->name)? $request->name : $old_user->name,
                'password' => isset($request->password)? bcrypt($request->password): $old_user->password ,
                'no_hp' => isset($request->no_hp)? $request->no_hp : $old_user->no_hp,
            ]);

            return redirect()->route('editUser')->with('success','Akun berhasil di update!');
        }
    }
}