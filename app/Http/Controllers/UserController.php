<?php

namespace App\Http\Controllers;

use Spatie\Permission\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;

use function PHPUnit\Framework\isNull;

class UserController extends Controller
{
    private $users;

    public function __construct()
    {
        $this->users = User::all();
        $this->middleware('auth');        
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();
        $users = User::with('roles')->get();
        $nonmembers = $users->reject(function ($user, $key) {
            return $user->hasRole('superadmin');
        });
        return view('admin.userdata', ['nonmembers' => $nonmembers]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = array(
            'name' => 'required',
            'email' => 'required|between:3,64|unique:users|email',
            'password' => 'required|confirmed|min:6',
            'no_hp' => 'numeric'
        );    
        $messages = array(
            'name.required' => 'Form Nama tidak boleh kosong!',
            'email.required' => 'Form Email tidak boleh kosong!',
            'email.unique' => 'Email sudah di gunakan, coba Email yang berbeda!',
            'password.required' => 'Form Password tidak boleh kosong!',
            'password.confirmed' => 'Password tidak sama! ',
            'no_hp.numeric' => 'Nomor tidak valid!!'
        );

        $request->all();
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        } else {
            $newUser = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'no_hp' => $request->no_hp,
            ]);
            
            $newUser -> assignRole($request->role);

            return redirect()->route('userdata')->with('success','User berhasil di tambahkan!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        if ($request->ajax()) {
            $user = User::findorfail($request->id);

            $modal = view('admin.modal.edituser', compact('user'))->render();

            return response()->json([
                'modal' =>  $modal
            ]);           
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $userdata = User::findorfail($id)->with('roles');
        return view('admin.modal.testing')->with('user', $userdata);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $old_user = User::findorfail($id);

        // dd($request->password);

        $rules = array(
            'name' => 'required',
            'email' => 'sometimes|required|email',
            'password' => 'confirmed',
            'no_hp' => 'numeric'
        );    
        $messages = array(
            'name.required' => 'Form Nama tidak boleh kosong!',
            'email.required' => 'Form Email tidak boleh kosong!',
            'email.unique' => 'Email sudah di gunakan, coba Email yang berbeda!',
            'password.confirmed' => 'Password tidak sama! ',
            'no_hp.numeric' => 'Nomor tidak valid!!'
        );

        $request->all();
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        } else {
            $old_user->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => isset($request->password)? bcrypt($request->password): $old_user->password ,
                'no_hp' => $request->no_hp,
            ]);
            $old_user -> syncRoles($request->role);

            return redirect()->route('userdata')->with('success','Data User berhasil di ubah!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::findorfail($id)->delete();

        return redirect()->back()->with('success','User berhasil dihapus.');
    }

    public function get_user(Request $request)
    {
        // return response('Hello World');
        // return ('Hello World');  
        return view('admin.dashboard');
        // if ($request->ajax()) {
        //     $user = User::findorfail($request->id);

        //     $modal = view('admin.modal.edituser', compact('user'))->render();

        //     // return response()->json([
        //     //     'modal' =>  $modal
        //     // ]);           
        //     return response('Hello World');            
        // } else {
        //     return ('Hello World');  
        // }
    }
}
