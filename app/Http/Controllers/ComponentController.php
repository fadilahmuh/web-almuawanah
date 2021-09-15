<?php

namespace App\Http\Controllers;

use App\Models\Component;
use App\Models\Files;
use Facade\FlareClient\Stacktrace\File;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class ComponentController extends Controller
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

    public function add_kontak(Request $request)
    {
        // dd($request->all());

        $rules = array(
            'divisi' => 'required',
            'bagian' => 'required',
            'judul' => 'required',
            'content' =>'required',
        );    
        $messages = array(
            'judul.required' => 'Gagal menambahkan kontak baru. Jenis kontak kosong, silahkan pilih salah satu!!',
            'content.required' => 'Gagal menambahkan kontak baru. Isi kontak kosong, silahkan isi sesuai jenis kontak!!',
        );

        $request->all();
        $validator = Validator::make($request->all(), $rules, $messages); 

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            Component::create([
                'divisi' => $request->divisi,
                'bagian' => $request->bagian,
                'judul' => $request->judul,
                'content' => $request->content,
                'desc1' => $request->desc1,
            ]);

            return redirect()->back()->with('success','Kontak berhasil ditambahkan');
        }
    }

    public function update_kontak(Request $request, $id)
    {
        // dd($request->all());

        $old_kontak = Component::findorfail($id);

        $rules = array(
            'divisi' => 'required',
            'bagian' => 'required',
            'judul' => 'required',
            'content' =>'required',
        );    
        $messages = array(
            'judul.required' => 'Gagal mengedit kontak. Jenis kontak kosong, silahkan pilih salah satu!!',
            'content.required' => 'Gagal mengedit kontak. Isi kontak kosong, silahkan isi sesuai jenis kontak!!',
        );

        $request->all();
        $validator = Validator::make($request->all(), $rules, $messages); 

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $old_kontak->update([
                'divisi' => $request->divisi,
                'bagian' => $request->bagian,
                'judul' => $request->judul,
                'content' => $request->content,
                'desc1' => $request->desc1,
            ]);

            return redirect()->back()->with('success','Kontak berhasil diupdate.');
        }
    }

    public function edit_kontak(Request $request)
    {
        if ($request->ajax()) {
            $kontak = Component::findorfail($request->id);

            $modal = view('admin.modal.editkontak', compact('kontak'))->render();

            return response()->json([
                'modal' =>  $modal
            ]);  
        }
    }

    public function delete_kontak($id)
    {
        Component::findorfail($id)->delete();

        return redirect()->back()->with('success','Kontak Berhasil Dihapus');
    }

    public function add_galeri(Request $request)
    {
        // dd($request->thumbnail->getClientOriginalName());
        $rules = array(
            'divisi' => 'required',
            'bagian' => 'required',
            'attachment' => 'required|mimes:jpg,png'
        );    
        $messages = array(
            'attachment.required' => 'Tidak ada foto untuk di upload, gagal menambahkan foto galeri.',
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

            return redirect()->back()->with('success','Foto berhasil ditambahkan ke galeri.');
        }
    }

    public function edit_galeri(Request $request)
    {
        if ($request->ajax()) {
            $foto = Component::findorfail($request->id);

            $modal = view('admin.modal.editgaleri', compact('foto'))->render();
            
            return response()->json([
                'modal' =>  $modal
            ]);           
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_galeri(Request $request, $id)
    {
        // dd($request->all());
        
        $old_galeri = Component::findorfail($id);

        $rules = array(
            'divisi' => 'required',
            'bagian' => 'required',
            'attachment' => 'mimes:jpg,png'
        );    

        $request->all();
        $validator = Validator::make($request->all(), $rules); 
        $gambar = $request->attachment;

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        } else {
            $old_galeri->update([
                'divisi' => $request->divisi,
                'bagian' => $request->bagian,
                'judul' => $request->judul,
                'content' => $request->content,
                'attachment' => $request->hasFile('attachment') ? $gambar->getClientOriginalName(): $old_galeri->attachment
            ]);
            
            $request->hasFile('attachment') ? $gambar->move('uploads/component/', $gambar->getClientOriginalName()): '';            

            return redirect()->back()->with('success','Foto Galeri berhasil diubah!!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete_galeri($id)
    {
        Component::findorfail($id)->delete();

        return redirect()->back()->with('success','Foto Galeri Berhasil Dihapus');
    }

    public function update_yt(Request $request, $id)
    {
        // dd($request->all());

        $old_yt = Component::findorfail($id);

        $old_yt->update([
            'divisi' => $request->divisi,
            'bagian' => $request->bagian,
            'content' => $request->content,
        ]);            
        

        return redirect()->back()->with('success','YouTube ID berhasil diubah!!');
        
    }

    public function add_file(Request $request)
    {
        $rules = array(
            'divisi' => 'required',
            'nama' => 'required',
            'file' => 'required|mimes:doc,docx,ppt,pptx,pdf,png,rar,zip|max:20480',
            'is_published' => 'required',
        );    
        $messages = array(
            'file.required' => 'Tidak ada file untuk di upload, gagal menambahkan file !!',
            'file.mimes' => 'Format file tidak didukung !! Format yang didukung doc,docx,ppt,pptx,pdf,png,rar,zip.',
            'file.max' => 'File terlalu besar (max 20MB) !!',
            'is_published' => 'Status publikasi kosong, Pilih status publikasi!!',
            'nama.required' => 'Nama file tidak boleh kosong !!',
        );

        $request->all();
        $validator = Validator::make($request->all(), $rules, $messages); 
        $file = $request->file;

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        } else {
            Files::create([
                'divisi' => $request->divisi,
                'is_published' => $request->is_published,
                'nama' => $request->nama,
                'file' =>$file->getClientOriginalName()
            ]);
            $file->move('uploads/file/',$file->getClientOriginalName());

            return redirect()->back()->with('success','File berhasil ditambahkan.');
        }
    }

    public function edit_file(Request $request)
    {
        if ($request->ajax()) {
            $file = Files::findorfail($request->id);

            $modal = view('admin.modal.editfile', compact('file'))->render();
            
            return response()->json([
                'modal' =>  $modal
            ]);           
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_file(Request $request, $id)
    {        
        $old_file = Files::findorfail($id);

        $rules = array(
            'divisi' => 'required',
            'nama' => 'required',
            'file' => 'mimes:doc,docx,ppt,pptx,pdf,png,rar,zip|max:20480'
        );    
        $messages = array(
            'file.mimes' => 'Format file tidak didukung !! Format yang didukung doc,docx,ppt,pptx,pdf,png,rar,zip.',
            'file.max' => 'File terlalu besar (max 20MB) !!',
        );  

        $request->all();
        $validator = Validator::make($request->all(), $rules, $messages); 
        $file = $request->file;

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        } else {
            $old_file->update([
                'nama' => $request->nama,
                'is_published' => $request->is_published,
                'file' => $request->hasFile('file') ? $file->getClientOriginalName(): $old_file->file
            ]);
            
            $request->hasFile('file') ? $file->move('uploads/file/', $file->getClientOriginalName()): '';            

            return redirect()->back()->with('success','File berhasil diubah!!');
        }
    
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete_file($id)
    {
        Files::findorfail($id)->delete();

        return redirect()->back()->with('success','File Berhasil Dihapus');
    }
}
