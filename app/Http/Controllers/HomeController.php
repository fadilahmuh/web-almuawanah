<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use App\Models\Tags;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

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
        $banners = DB::table('components')
            ->where('divisi', 'Yayasan')
            ->where('bagian', 'banner')->get();

        $sambutan = DB::table('components')
            ->where('divisi', 'Yayasan')
            ->where('bagian', 'sambutan')->first();

        $deskripsi = DB::table('components')
            ->where('divisi', 'Yayasan')
            ->where('bagian', 'deskripsi-singkat')->first();

        $brosur = DB::table('components')
            ->where('divisi', 'Yayasan')
            ->where('bagian', 'brosur')->get();
        
        // $posts = DB::table('posts')
        //     ->where('is_published', 1)
        //     ->orderBy('created_at', 'desc')
        //     ->paginate(3);

        $posts = Posts::all()
            ->where('is_published', 1)
            ->sortByDesc('created_at')
            ->take(3);

        // dd($posts);

        return view('pages.home', compact('banners','sambutan','deskripsi','brosur','posts'));
    }

    public function profile()
    {
    $tentang = DB::table('components')
        ->where('divisi', 'Yayasan')
        ->where('bagian', 'tentang')->first();
    
    // dd($tentang);
    
    $visi = DB::table('components')
        ->where('divisi', 'Yayasan')
        ->where('bagian', 'visi')->first();

    $misi = DB::table('components')
        ->where('divisi', 'Yayasan')
        ->where('bagian', 'misi')->first();

        return view('pages.profile', compact('tentang', 'visi', 'misi'));
    }

    public function program()
    {
        return view('pages.pendidikan-program');
    }
    
    public function galeri()
    {

    $foto = DB::table('components')
        ->where('divisi', 'yayasan')
        ->where('bagian', 'galeri')->get();

    $yt = DB::table('components')
        ->where('divisi', 'yayasan')
        ->where('bagian', 'youtube')->first();
    
        // dd($foto);
        return view('pages.galeri', compact('yt', 'foto'));
    }

    public function blog_post($slug){        
        $posts = Posts::all()
            ->where('is_published', 1)
            ->where('slug','!=' ,$slug)
            ->sortByDesc('visits')
            ->take(3);

        $tags = Tags::all();

    	$data = Posts::where('slug', $slug)
            ->where('is_published',1)
            ->first();  

        $data->increment('visits', 1);

        // dd($tags);
    	return view('pages.blog_post', compact('data', 'posts','tags'));
    }

    public function posts_tag($tag){   
        $tag_edit = '%'.Str::lower($tag).'%';

        $posts = Posts::where('tag', 'LIKE', $tag_edit)
            ->where('is_published',1)
            ->orderByDesc('created_at')
            ->paginate(5);

        $tags = Tags::all();

        $most = Posts::all()
        ->where('is_published', 1)
        ->sortByDesc('visits')
        ->take(3);

        // dd($posts);
    	return view('pages.blog_tag', compact('tag','posts','tags','most'));
    }

    public function posts_search(Request $request){   
        $query = '%'.Str::lower($request->s).'%';

        $searchquery = explode(' ', $request->s);

        $posts = Posts::query();
        foreach($searchquery as $word){
            $posts->Where('slug', 'LIKE', '%'.$word.'%');
        }
        $posts->where('is_published', 1)->orderByDesc('created_at');
        $posts = $posts->distinct()->paginate(5);

        $tags = Tags::all();

        $most = Posts::all()
        ->where('is_published', 1)
        ->sortByDesc('visits')
        ->take(3);

        // dd($posts);
    	return view('pages.blog_search', compact('posts','tags','most'));
    }

    public function blog()
    {
        $posts = Posts::where('is_published', 1)
            ->orderByDesc('created_at')
            ->paginate(3);

        $tags = Tags::all();

        $most = Posts::all()
            ->where('is_published', 1)
            ->sortByDesc('visits')
            ->take(3);

        return view('pages.blog', compact('posts','tags', 'most'));
    }

    public function kontak()
    {

        $kontak = DB::table('components')
            ->where('divisi', 'Yayasan')
            ->where('bagian', 'kontak')
            ->orderBy('judul','desc')->get();

        // dd( $this->kontak);
        return view('pages.kontak', compact('kontak'));
    }

    public function donasi()
    {
        return view('pages.donasi');
    }

    public function pendaftaran()
    {
        return view('pages.pendaftaran');
    }
}
