<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use App\Models\Tags;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blog = Posts::all();
        $tags = Tags::all();
        // dd($blog);
        return view('admin.blog', compact('blog', 'tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blog_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function add_tag(Request $request)
    {
        $rules = array(
            'nama' => 'required|unique:tags'
        );    
        $messages = array(
                'nama.required' => 'Tag kosong',
                'nama.unique' => 'Tag sudah dalam data'
        );
        // $this->validate($request,[
        //     'newtag' => 'required|unique'
        // ]);
        
        // $validator = Validator::make($request->all(), [
        //     'nama' => 'required|unique:tags',
        // ]);
        $validator = Validator::make($request->all(), $rules, $messages); 

        if ($validator->fails()) {
            // return redirect()->back()->with('failed', $validator->getMessageBag()->all()[0] + 'Gagal menambahkan Tags');
            return redirect()->back()->withErrors($validator);
            // dd($validator->getMessageBag()->all()[0]);
        } else {
            Tags::create([
                'nama' => $request->nama
            ]);
            return redirect()->back()->with('success','Tag berhasil ditambahkan');
        }

    }
}
