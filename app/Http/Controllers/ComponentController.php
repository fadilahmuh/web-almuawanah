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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_banner(Request $request, $id)
    {
        // dd($request->all());
        $old_banner = Component::findorfail($id);

        $rules = array(
            'divisi' => 'required',
            'bagian' => 'required',
            'attachment' => 'mimes:jpg,bmp,png'
        );    

        $request->all();
        $validator = Validator::make($request->all(), $rules); 
        $gambar = $request->attachment;

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        } else {
            $old_banner->update([
                'divisi' => $request->divisi,
                'bagian' => $request->bagian,
                'judul' => $request->judul,
                'content' => $request->content,
                'attachment' => $request->hasFile('attachment') ? $gambar->getClientOriginalName(): $old_banner->attachment
            ]);
            
            $request->hasFile('attachment') ? $gambar->move('uploads/component/', $gambar->getClientOriginalName()): '';            

            return redirect()->back()->with('success','Banner berhasil diubah!!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete_banner($id)
    {
        Component::findorfail($id)->delete();

        return redirect()->back()->with('success','Banner Berhasil Dihapus');
    }

}
