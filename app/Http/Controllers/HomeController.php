<?php

namespace App\Http\Controllers;

use App\Models\Files;
use App\Models\Posts;
use App\Models\Records;
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
    $setting =  DB::table('components')
        ->where('divisi', 'yayasan')
        ->where('bagian', 'galeri_setting')->first();

    $foto = DB::table('galeri')
        ->where('divisi', 'yayasan')
        ->orderBy('updated_at', 'DESC')
        ->limit((int)$setting->content)
        ->get();

    $yt = DB::table('components')
        ->where('divisi', 'yayasan')
        ->where('bagian', 'youtube')->first();

    $yt_single = DB::table('components')
    ->where('divisi', 'yayasan')
    ->where('bagian', 'youtube_single')->first();

    
    $title = 'Galeri';

        return view('pages.galeri', compact('title','yt', 'foto','yt_single','setting'));
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

        $kata = $request->s;

        $title = 'Penelusuran: '.$kata;

        // dd($posts);
    	return view('pages.blog_search', compact('title','posts','tags','most','kata'));
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

        // dd($posts);

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
        \Midtrans\Config::$isProduction = false;
        \Midtrans\Config::$isSanitized = true;
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => rand(),
                'gross_amount' => $request->data['nominal']+5000,
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
    }

    public function simpan_donasi(Request $request)
    {
        // dd($request);
        
        \Midtrans\Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $detail = \Midtrans\Transaction::status($request->order_id);
        // dd($detail);
        // dd($detail->order_id);
        Records::create([
            'id' => (int)$detail-> order_id,
            'id_transaksi' => $detail -> transaction_id,
            'nominal' => (int)$detail -> gross_amount,
            'status' => $detail -> transaction_status

        ]);

        return redirect()->route('wakaf');
    }

    public function pendaftaran()
    {
        return view('pages.pendaftaran');
    }

    public function download()
    {
        $files = Files::all()->where('divisi', 'Yayasan')->where('is_published', 1);
        return view('pages.download',compact('files'));
    }
}
