@extends('admin.appadmin')

@section('csslib')
<link rel="stylesheet" href="{{ asset('assets/modules/datatables/datatables.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/modules/dropify/dist/css/dropify.css') }}">
@endsection

@section('maincontent')
<!-- Main Content -->
<div class="main-content">
    <section class="section">
      <div class="section-header">
          <h1>Kontak Yayasan Al-Mu'awanah</h1>
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
        <h2 class="section-title">Daftar Kontak</h2>
        <!-- Content -->
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
                    <a href="#" class="btn btn-icon icon-right btn-success" data-toggle="modal" data-target="#kontakModal">
                      <i class="fas fa-plus"></i> 
                      Tambah Kontak
                    </a>                        
                  </div>                      
                </div>
                <br>
                <!-- Kontak Table -->

                <div class="table-responsive">
                  <table class="table table-striped" id="table-1">
                    <thead  class="text-center">
                      <tr>
                        <th>No</th>
                        <th>Jenis Kontak</th>
                        <th>Keterangan</th>
                        <th>Isi Kontak</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody class="text-center">
                      @foreach($kontak as $key=>$k)
                      <tr>
                        <td class="align-middle">{{++$key}}</td>
                        <td class="align-middle">{{ $k->judul }}</td>
                        <td class="align-middle">@isset($k->desc1) ({{$k->desc1}}) @endisset</td>
                        <td class="align-middle">{{ $k->content }}</td>
                        <td class="align-middle">
                          <div class="btn-toolbar justify-content-center" role="group">
                            <a href="" class="edit btn btn-warning" data-toggle="tooltip" data-placement="top" data-id="{{ $k->id }}" data-url="{{route('getkontak')}}" data-original-title="Edit"><i class="fas fa-edit"></i></a>
                            <form action="{{ route('delkontak', [$k->id]) }}" method="POST">
                              @csrf
                              @method('delete')
                              <button class="del btn btn-icon btn-danger" data-judul="{{ $k->judul }}" data-ket="{{$k->desc1}}" data-toggle="tooltip" data-placement="top" data-original-title="Hapus"><i class="fas fa-trash"></i></button>
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
      </div>
    </section>
  </div>
</div>
@endsection

@section('modalscontent')
<div class="modal fade" id="kontakModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Kontak</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <form action="{{ route('addkontak') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST')
        <input type="hidden" name="divisi" value="{{session('divisi')}}">
        <input type="hidden" name="bagian" value="kontak">
      <!-- Judul -->
      <div class="modal-body">
        <div class="form-group">
          <label>Jenis Kontak</label>
          <select name="judul" class="form-control">
            <option value="">Pilih Satu</option>
            <option value="Telepon" @if(old('judul') == 'Telepon') selected @endif>Telepon</option>
            <option value="Whatsapp" @if(old('judul') == 'Whatsapp') selected @endif>Whatsapp</option>
            <option value="Email" @if(old('judul') == 'Email') selected @endif>Email</option>
            <option value="Alamat" @if(old('judul') == 'Alamat') selected @endif>Alamat</option>
          </select>
        </div>
        <div class="form-group">
          <label>Keterangan</label>
          <input name="desc1" type="text" class="form-control" placeholder="(Opsional)" value="{{old('desc1')}}">
        </div>
        <!-- Deskripsi -->
        <div class="form-group">
          <label>Isi Kontak</label>
          <input name="content" type="text" class="form-control" value="{{old('content')}}">
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

<div class="modal fade" id="EditKontak" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
</div>
@endsection

@section('scriptlib')
<!-- JS Libraies -->
<script src="{{ asset('assets/modules/datatables/datatables.min.js') }}"></script>
<script src="{{ asset('assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/modules/sweetalert/sweetalert.min.js') }}"></script>
@endsection

@section('scriptpage')
<!-- Page Specific JS File -->
<script src="{{ asset('assets/js/page/modules-datatables.js') }}"></script>
<script src="{{ asset('assets/js/views/kontak.js') }}"></script>
@endsection
