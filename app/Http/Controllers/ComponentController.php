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

    public function update_sambutan(Request $request, $id)
    {
        // dd($request->all());

        $old_sambutan = Component::findorfail($id);

        $rules = array(
            'divisi' => 'required',
            'bagian' => 'required',
            'attachment' => 'mimes:jpg,png'
        );   
        
        $messages = array(
            'attachment.mimes' => 'File format thumbnail salah, harap masukan file format jpg, png.',
        );

        $request->all();
        $validator = Validator::make($request->all(), $rules, $messages); 
        $gambar = $request->attachment;

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        } else {
            $old_sambutan->update([
                'divisi' => $request->divisi,
                'bagian' => $request->bagian,
                'judul' => $request->judul,
                'content' => $request->content,
                'attachment' => $request->hasFile('attachment') ? $gambar->getClientOriginalName(): $old_sambutan->attachment,
                'desc1' => $request->nama,
                'desc2' => $request->keterangan,
            ]);            
            
            $request->hasFile('attachment') ? $gambar->move('uploads/component/', $gambar->getClientOriginalName()): '';            

            return redirect()->back()->with('success','Sambutan berhasil diubah!!');
        }
    }

    public function update_deskripsi(Request $request, $id)
    {
        // dd($request->all());

        $old_deskripsi = Component::findorfail($id);

        $rules = array(
            'divisi' => 'required',
            'bagian' => 'required',
            'attachment' => 'mimes:jpg,png'
        );   
        
        $messages = array(
            'attachment.mimes' => 'File format thumbnail salah, harap masukan file format jpg, png.',
        );

        $request->all();
        $validator = Validator::make($request->all(), $rules, $messages); 
        $gambar = $request->attachment;

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        } else {
            $old_deskripsi->update([
                'divisi' => $request->divisi,
                'bagian' => $request->bagian,
                'content' => $request->content,
                'attachment' => $request->hasFile('attachment') ? $gambar->getClientOriginalName(): $old_deskripsi->attachment,
            ]);            
            
            $request->hasFile('attachment') ? $gambar->move('uploads/component/', $gambar->getClientOriginalName()): '';            

            return redirect()->back()->with('success','Deskripsi berhasil diubah!!');
        }
    }

    public function add_brosur(Request $request)
    {
        // dd($request->all());
        $rules = array(
            'divisi' => 'required',
            'bagian' => 'required',
            'judul' => 'required',
            'attachment' => 'required|mimes:jpg,png'
        );    
        $messages = array(
            'judul.required' => 'Judul kosong, Tambahkan judul!!',
            'attachment.required' => 'Gambar banner kosong, gagal menambahkan banner.',
            'attachment.mimes' => 'File format thumbnail salah, harap masukan file format jpg, png.',
        );

        $request->all();
        $validator = Validator::make($request->all(), $rules, $messages); 
        $gambar = $request->attachment;

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            Component::create([
                'divisi' => $request->divisi,
                'bagian' => $request->bagian,
                'judul' => $request->judul,
                'content' => $request->content,
                'attachment' => $gambar->getClientOriginalName()
            ]);
            $gambar->move('uploads/component/', $gambar->getClientOriginalName());

            return redirect()->back()->with('success','Brosur berhasil ditambahkan');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_brosur(Request $request, $id)
    {
        // dd($request->all());
        
        $old_brosur = Component::findorfail($id);

        $rules = array(
            'divisi' => 'required',
            'bagian' => 'required',
            'judul' => 'required',
            'attachment' => 'mimes:jpg,png'
        );    

        $messages = array(
            'judul.required' => 'Judul kosong, Tambahkan judul!!',
            'attachment.mimes' => 'File format thumbnail salah, harap masukan file format jpg, png.',
        );

        $request->all();
        $validator = Validator::make($request->all(), $rules,$messages); 
        $gambar = $request->attachment;

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        } else {
            $old_brosur->update([
                'divisi' => $request->divisi,
                'bagian' => $request->bagian,
                'judul' => $request->judul,
                'content' => $request->content,
                'attachment' => $request->hasFile('attachment') ? $gambar->getClientOriginalName(): $old_brosur->attachment
            ]);
            
            $request->hasFile('attachment') ? $gambar->move('uploads/component/', $gambar->getClientOriginalName()): '';            

            return redirect()->back()->with('success','Brosur berhasil diubah!!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete_brosur($id)
    {
        Component::findorfail($id)->delete();

        return redirect()->back()->with('success','Brosur Berhasil Dihapus');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_tentang(Request $request, $id)
    {
        // dd($request->all());
        
        $old_tentang = Component::findorfail($id);

        $rules = array(
            'divisi' => 'required',
            'bagian' => 'required',
            'content' => 'required'
        );    

        $messages = array(
            'content.required' => 'Bagian isi Tentang Kami tidak boleh kosong!!',
        );

        $request->all();
        $validator = Validator::make($request->all(), $rules,$messages); 

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        } else {
            $old_tentang->update([
                'divisi' => $request->divisi,
                'bagian' => $request->bagian,
                'content' => $request->content,
            ]);
            
            return redirect()->back()->with('success','Isi content Tentang Kami berhasil diubah!!');
        }
    }

    public function update_visi(Request $request, $id)
    {
        // dd($request->all());
        
        $old_visi = Component::findorfail($id);

        $rules = array(
            'divisi' => 'required',
            'bagian' => 'required',
            'content' => 'required'
        );    

        $messages = array(
            'content.required' => 'Bagian isi Visi tidak boleh kosong!!',
        );

        $request->all();
        $validator = Validator::make($request->all(), $rules,$messages); 

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        } else {
            $old_visi->update([
                'divisi' => $request->divisi,
                'bagian' => $request->bagian,
                'content' => $request->content,
            ]);
            
            return redirect()->back()->with('success','Isi content Visi berhasil diubah!!');
        }
    }

    public function update_misi(Request $request, $id)
    {
        // dd($request->all());
        
        $old_visi = Component::findorfail($id);

        $rules = array(
            'divisi' => 'required',
            'bagian' => 'required',
            'content' => 'required'
        );    

        $messages = array(
            'content.required' => 'Bagian isi Misi tidak boleh kosong!!',
        );

        $request->all();
        $validator = Validator::make($request->all(), $rules,$messages); 

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        } else {
            $old_visi->update([
                'divisi' => $request->divisi,
                'bagian' => $request->bagian,
                'content' => $request->content,
            ]);
            
            return redirect()->back()->with('success','Isi content Misi berhasil diubah!!');
        }
    }

}
