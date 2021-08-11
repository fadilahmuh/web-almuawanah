<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use App\Models\Tags;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    private $blog;
    private $tags;

    public function __construct()
    {
        $this->middleware('auth');
        $this->blog = Posts::all();
        $this->tags = Tags::all();
    }    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return view('admin.blog', compact('blog', 'tags'));
        return view('admin.blog')
            ->with('blog', $this->blog)
            ->with('tags', $this->tags);
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
        $rules = array(
            'judul' => 'required',
            'slug' => 'unique:posts',
            'content' => 'required',
            'is_published' => 'required'
        );    
        $messages = array(
            'require.required' => 'Judul Kosong, Tambahkan judul postingan!!',
            'slug.unique' => 'Judul sudah digunakan, gunakan judul lain!!',
            'content.require' => 'Tidak ada konten pada postingan!!',
            'is_published' => 'Status postingan kosong, Pilih status postingan!!'

        );
        $request->all();
        $request->request->add(['slug' => Str::of($request->judul)->slug('-')]);        
        // dd($request->all());
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        } else {
            Posts::create([
                'judul' => $request->judul,
                'slug' => $request->slug,
                'content' => $request->content,
                'tag' => $request->tag,
                'is_published' => $request->is_published,
                'users_id' => Auth::user()->id

            ]);

            if($request->is_published == 0)
            {
                $msg = 'Post berhasil ditambahkan ke Draft.';
            } else {
                $msg = 'Post berhasil ditambahkan dam dipublikasikan.';
            };
            return redirect()->route('blog')->with('success',$msg);
        }
        // return redirect()->back()->withInput();
        // dd($request);
        // return ("post the blog");
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
            'nama.required' => 'Tag kosong, Gagal menambahkan Tag.',
            'nama.unique' => 'Gagal menambahkan, Tag sudah dalam data!!'
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
