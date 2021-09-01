<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use App\Models\Tags;
use Carbon\Carbon;
use GrahamCampbell\ResultType\Result;
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

    $title = 'Profil';

        return view('pages.profile', compact('title','tentang', 'visi', 'misi'));
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
    
    $title = 'Galeri';

        return view('pages.galeri', compact('title','yt', 'foto'));
    }

    public function blog_post($slug){        
        
        $data = Posts::where('slug', $slug)
            ->where('is_published',1)
            ->first();  

        if (isset($data)) {
            $data->increment('visits', 1);

            $tags = Tags::all();

            $posts = Posts::all()
            ->where('is_published', 1)
            ->where('slug','!=' ,$slug)
            ->sortByDesc('visits')
            ->take(3);

            $title = $data->judul;

            return view('pages.blog_post', compact('title','data', 'posts','tags'));
        } else {
            abort(404);
        }


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

        $title = 'Tag - '.$tag;

    	return view('pages.blog_tag', compact('title','tag','posts','tags','most'));
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

        $title = 'Penelusuran: '.$request->s;

        // dd($posts);
    	return view('pages.blog_search', compact('title','posts','tags','most'));
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

        $title = 'Blog';

        return view('pages.blog', compact('title','posts','tags', 'most'));
    }

    public function kontak()
    {

        $kontak = DB::table('components')
            ->where('divisi', 'Yayasan')
            ->where('bagian', 'kontak')
            ->orderBy('judul','desc')->get();
        
        $title = 'Kontak Kami';

        return view('pages.kontak', compact('title','kontak'));
    }

    public function donasi()
    {
        $title = 'Wakaf & Donasi';

        return view('pages.donasi',compact('title'));
    }

    public function checkout_donasi(Request $request)
    {
        \Midtrans\Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => rand(),
                'gross_amount' => $request->data['nominal'],
                'name' => "Wakaf"
            ),
            'customer_details' => array(
                'first_name'    => $request->data['name'],
                'email'         => $request->data['email'],
                'phone'         => $request->data['phone'],
            )
        );
        
        $snapToken = \Midtrans\Snap::getSnapToken($params);

        return response()->json([
            'token' => $snapToken,
        ]);
        // dd($snapToken);
    }

    public function pendaftaran()
    {
        return view('pages.pendaftaran');
    }
}
