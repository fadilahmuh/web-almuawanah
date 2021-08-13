<?php

namespace App\Http\Controllers;

use App\Models\Component;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class ComponentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    

    // ====BANNER====
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function add_banner(Request $request)
    {
        // dd($request->thumbnail->getClientOriginalName());
        $rules = array(
            'divisi' => 'required',
            'bagian' => 'required',
            'attachment' => 'required|mimes:jpg,bmp,png'
        );    
        $messages = array(
            'attachment.required' => 'Gambar banner kosong, gagal menambahkan banner.',
        );

        $request->all();
        $validator = Validator::make($request->all(), $rules, $messages); 
        $gambar = $request->attachment;

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        } else {
            Component::create([
                'divisi' => $request->divisi,
                'bagian' => $request->bagian,
                'judul' => $request->judul,
                'content' => $request->content,
                'attachment' => $gambar->getClientOriginalName()
            ]);
            $gambar->move('uploads/component/', $gambar->getClientOriginalName());

            return redirect()->back()->with('success','Banner berhasil ditambahkan');
        }
    }

    // public function test_banner() {
    //     return ('test banenr yo');
    // }

}
