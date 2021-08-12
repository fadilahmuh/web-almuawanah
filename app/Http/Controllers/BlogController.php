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
        // dd($this->blog[1]->tag);
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
        return view('admin.blog_create')->with('tags', $this->tags);
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
            'is_published' => 'required',
            'thumbnail' => 'required|mimes:jpg,bmp,png'
        );    
        $messages = array(
            'judul.required' => 'Judul Kosong, Tambahkan judul postingan!!',
            'slug.unique' => 'Judul sudah digunakan, gunakan judul lain!!',
            'content.required' => 'Tidak ada konten pada postingan!!',
            'is_published' => 'Status postingan kosong, Pilih status postingan!!',
            'thumbnail.required' => 'Thumbnail postingan kosong, tambahkan thumbnail postingan!!',
            'thumbnail.mimes' => 'File format thumbnail salah, harap masukan file format jpg,bmp,png'
        );
        $request->all();
        $request->request->add(['slug' => Str::of($request->judul)->slug('-')]);        
        $validator = Validator::make($request->all(), $rules, $messages);
        
        $tags = collect($request->tag)->implode(',');

        $gambar = $request->thumbnail;

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        } else {
            Posts::create([
                'judul' => $request->judul,
                'slug' => $request->slug,
                'content' => $request->content,
                'tag' => $tags,
                'is_published' => $request->is_published,
                'users_id' => Auth::user()->id,
                'thumbnail' => $gambar->getClientOriginalName()
            ]);

            $gambar->move('uploads/posts/', $gambar->getClientOriginalName());

            if($request->is_published == 0)
            {
                $msg = 'Postingan berhasil ditambahkan ke Draft.';
            } else {
                $msg = 'Postingan berhasil ditambahkan dan dipublikasikan.';
            };
            return redirect()->route('blog')->with('success',$msg);
        }
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
     * Show the form for ing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Posts::where('slug', '=', $id)->firstOrFail();
        // $post = Posts::findorfail($id);
        // dd($post);
        return view('admin.blog_edit')
            ->with('post', $post)
            ->with('tags', $this->tags);
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
        // dd($request->hasFile('thumbnail'));
        $old_post = Posts::findorfail($id);

        $rules = array(
            'judul' => 'required',
            'slug' => 'unique:posts,slug,'.$id,
            'content' => 'required',
            'is_published' => 'required',
            'thumbnail' => 'mimes:jpg,bmp,png'
        );    
        $messages = array(
            'judul.required' => 'Judul Kosong, Tambahkan judul postingan!!',
            'slug.unique' => 'Judul sudah digunakan, gunakan judul lain!!',
            'content.required' => 'Tidak ada konten pada postingan!!',
            'is_published' => 'Status postingan kosong, Pilih status postingan!!',
            'thumbnail.mimes' => 'File format thumbnail salah, harap masukan file format jpg,bmp,png'
        );

        $request->all();
        $request->request->add(['slug' => Str::of($request->judul)->slug('-')]);        
        $validator = Validator::make($request->all(), $rules, $messages);
        $tags = collect($request->tag)->implode(',');
        $gambar = $request->thumbnail;

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        } else {
            $old_post->update([
                'judul' => $request->judul,
                'slug' => $request->slug,
                'content' => $request->content,
                'tag' => $tags,
                'is_published' => $request->is_published,
                'users_id' => Auth::user()->id,
                'thumbnail' => $request->hasFile('thumbnail') ? $gambar->getClientOriginalName() : $old_post->thumbnail,
            ]);

            $request->hasFile('thumbnail') ? $gambar->move('uploads/posts/', $gambar->getClientOriginalName()): '';

            return redirect()->route('blog')->with('success','Postingan berhasil diubah!!');
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
        Posts::findorfail($id)->delete();

        return redirect()->back()->with('success','Post Berhasil Dihapus');
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

        $validator = Validator::make($request->all(), $rules, $messages); 

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        } else {
            Tags::create([
                'nama' => $request->nama
            ]);
            return redirect()->back()->with('success','Tag berhasil ditambahkan');
        }

    }

    public function del_tag($id)
    {
        Tags::findorfail($id)->delete();

        return redirect()->back()->with('success','Tag Berhasil Dihapus');
    }
}
