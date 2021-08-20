@extends('admin.appadmin')


@section('csslib')
<link rel="stylesheet" href="{{ asset('adminAssets/modules/datatables/datatables.min.css') }}">
<link rel="stylesheet" href="{{ asset('adminAssets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('adminAssets/modules/dropify/dist/css/dropify.css') }}">
<link rel="stylesheet" href="{{ asset('adminAssets/modules/chocolat/dist/css/chocolat.css') }}">
@endsection

@section('maincontent')
<!-- Main Content -->
<div class="main-content">
    <section class="section">
      <div class="section-header">
          <h1>Galeri Website Al-Mu'awanah</h1>
      </div>
      @if($errors->any())
      @foreach($errors->getMessages() as $this_error)
      <div class="alert alert-danger" role="alert">
        <i class="fas fa-exclamation-triangle  mr-3"></i> {{$this_error[0]}}
      </div> 
      @endforeach
      @endif 
      @if(Session::has('success'))
      <div class="alert alert-success" role="alert">
        <i class="fas fa-check mr-3"></i> {{ Session('success') }} 
      </div>        
      @endif
      <div class="section-body">
        <!-- Content -->
        <h2 class="section-title">Daftar Foto - Foto</h2>
        <!-- Table Foto -->
        <div class="row">
          <div class="col-12">
            <div class="card">
              <!-- Header Table -->
              <!-- <div class="card-header">
                <h4>Tabel Admin</h4>              
              </div> -->
              <div class="card-body">
                <!-- Tambah Button -->
                <div class="text-right">
                  <div>
                    <a href="#" class="btn btn-icon icon-right btn-success" data-toggle="modal" data-target="#galeryModal">
                      <i class="fas fa-plus"></i> 
                      Tambah Galeri
                    </a>                        
                  </div>
                  
                </div>
                <br>
                <div class="table-responsive">
                  <table class="table table-striped" id="table-blog">
                    <thead  class="text-center">
                      <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Deskripsi</th>
                        <th>Gambar</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody class="text-center">
                      @foreach($galeri as $key=>$g)
                      <tr>
                        <td class="align-middle">{{++$key}}</td>
                        <td class="align-middle">{{ $g->judul }}</td>
                        <td class="align-middle">{{ $g->content }}</td>
                        <td class="align-middle">
                          <div class="gallery">
                            <div class="gallery-item" data-image="{{ asset('uploads/component/'.$g->attachment) }}" data-title="{{ $g->judul }}" href="{{ asset('uploads/component/'.$g->attachment) }}" title="{{ $g->judul }}" style="background-image: url({{ asset('uploads/component/'.$g->attachment) }});"></div>                  
                          </div>                          
                        </td>
                        <td class="align-middle">
                          <div class="btn-toolbar justify-content-center" role="group">
                            <a href="" class="edit btn btn-icon btn-warning" data-id="{{ $g->id }}"  data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class="fas fa-edit"></i></a>
                            <form action="{{ route('delgaleri', [$g->id]) }}" method="POST">
                              @csrf
                              @method('delete')
                              <button class="del btn btn-icon btn-danger" data-toggle="tooltip" data-placement="top" data-original-title="Hapus"><i class="fas fa-trash"></i></button>
                            </form>
                          </div>
                        </td>
                      </tr>  
                      @endforeach                  
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>     
        
        <h2 class="section-title">Youtube Channel</h2>
        <!-- Youtube Channel -->
        <div class="row">
          <div class="col-12">
            <div class="card">
              <!-- Header Table -->
              <div class="card-header">
                <h4></h4>              
              </div>
              <form action="{{ route('edityt', [$yt->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" name="divisi" value="{{session('divisi')}}">
                <input type="hidden" name="bagian" value="youtube">
              <div class="card-body">
                <!-- Banner Form -->                    
                <!-- Isi Sambutan -->
                <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Youtube ID</label>
                  <div class="col-sm-12 col-md-7">
                    <input name="content" type="text" class="form-control" disabled value="{{$yt->content}}">
                  </div>
                </div>
              </div>
              <!-- Buttons -->
              <div class="card-footer text-right">
                  <div class="buttons">
                    <button class="cancel btn btn-danger collapse multi-collapse" data-toggle="collapse" data-target=".multi-collapse" ><i class="fas fa-times"></i> Cancel</button>
                    <button class="save btn btn-success collapse multi-collapse"><i class="far fa-save"></i> Simpan</button>
                    <button class="edit2 btn btn-warning collapse multi-collapse show"  data-toggle="collapse" data-target=".multi-collapse" ><i class="fas fa-edit"></i> Edit</button>
                  </div>
              </div>
              </form>
            </div>
          </div>
        </div>  

      </div>
    </section>
  </div>
</div>
@endsection

@section('modalscontent')
<!-- Modal Add Galery -->
<div class="modal fade" id="galeryModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Foto Galeri</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('newgaleri') }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('POST')
          <input type="hidden" name="divisi" value="{{session('divisi')}}">
          <input type="hidden" name="bagian" value="galeri">
        <!-- Judul -->
        <div class="modal-body">
          <div class="form-group">
            <label>Judul</label>
            <input name="judul" type="text" class="form-control" placeholder="(Opsional)">
          </div>
          <!-- Deskripsi -->
          <div class="form-group">
            <label>Deskripsi</label>
            <textarea name="content" class="form-control" name="content" rows="3" placeholder="(Opsional)"></textarea>
          </div>
          <!-- Gambar -->
          <div class="form-group">
            <label>Foto/Gambar</label>
            <div class="col-sm-12 col-md-auto">
                <input type="file" name="attachment" class="dropify" data-show-remove="false" data-height="300" />
            </div>
          </div>              
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
          <button type="submit" class="btn btn-success">Simpan</button>
        </div>
      </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="EditGaleri" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
</div>
@endsection

@section('scriptlib')
<!-- JS Libraies -->
<script src="{{ asset('adminAssets/modules/dropify/dist/js/dropify.js') }}"></script>
<script src="{{ asset('adminAssets/modules/datatables/datatables.min.js') }}"></script>
<script src="{{ asset('adminAssets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('adminAssets/modules/sweetalert/sweetalert.min.js') }}"></script>
<script src="{{ asset('adminAssets/modules/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>
@endsection

@section('scriptpage')
<!-- Page Specific JS File -->
<script src="{{ asset('adminAssets/js/page/modules-datatables.js') }}"></script>
<script src="{{ asset('adminAssets/js/views/galeri.js') }}"></script>
@endsection

@section('scriptline')
<script>
  
</script>
@endsection