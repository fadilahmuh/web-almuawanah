@extends('admin.appadmin')

@section('csslib')
<link rel="stylesheet" href="{{ asset('assets/modules/datatables/datatables.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/modules/dropify/dist/css/dropify.css') }}">
<link rel="stylesheet" href="{{ asset('assets/modules/jquery-selectric/selectric.css') }}">
<link rel="stylesheet" href="{{ asset('assets/modules/select2/dist/css/select2.min.css') }}">
@endsection

@section('maincontent')
<div class="main-content">
    <section class="section">
      <div class="section-header">
          <h1>Daftar File</h1>
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
        <h2 class="section-title">List File Download</h2>
        <!-- Content -->
        <div class="row mt-4">
          <div class="col-12">
            <div class="card">
              <div class="card-body">
                <div class="text-right">
                  <div>
                    <a href="#" class="btn btn-icon icon-right btn-success" data-toggle="modal" data-target="#fileModal">
                      <i class="fas fa-plus"></i> 
                      Tambah File
                    </a>                    
                  </div>
                </div>
                <br>
                
                <div class="clearfix mb-3"></div>                

                <div class="table-responsive">
                  <table class="table table-striped" id="table-file">
                    <thead  class="text-center">
                      <tr>
                        <th>Nama File</th>
                        <th>Tanggal Dibuat</th>
                        <th>Tanggal Update</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody class="text-center">
                      @foreach($files as $f)
                      <tr>
                        <td class="align-middle">{{ $f->nama }}</td>
                        <td class="align-middle">{{ $f->created_at }}</td>
                        <td class="align-middle">{{ $f->updated_at }}</td>
                        <td class="align-middle">
                          @if ($f->is_published == 1 )
                          <a href=""  class="badge badge-success text-white">Published</a>
                          @else
                          <a href="" class="badge badge-warning text-white">Draft</a>
                          @endif
                        </td>
                        <td class="align-middle">
                          <div class="btn-toolbar justify-content-center" role="group">
                            <a href="{{asset('uploads/file/'.Str::replace(' ', '%20', $f->file))}}" target="_blank" class="btn btn-icon btn-primary" data-toggle="tooltip" data-placement="top" data-original-title="Download"><i class="fas fa-file-download"></i></a>
                            <a href="" class="edit btn btn-icon btn-warning" data-id="{{ $f->id }}"  data-toggle="tooltip" data-placement="top" data-url="{{route('getfile')}}" data-original-title="Edit"><i class="fas fa-edit"></i></a>
                            <form action="{{ route('delfile', [$f->id]) }}" method="POST">
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
      </div>
    </section>
  </div>
</div>
@endsection

@section('modalscontent')
<!-- Modal Add Galery -->
<div class="modal fade" id="fileModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah File</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('newfile') }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('POST')
          <input type="hidden" name="divisi" value="{{session('divisi')}}">
        <!-- Judul -->
        <div class="modal-body">
          <div class="form-group">
            <label>Nama File</label>
            <input name="nama" type="text" class="form-control">
          </div>          

          <div class="form-group">
            <label>File</label>
            <div class="col-sm-12 col-md-auto">
                <input type="file" name="file" class="dropify" data-show-remove="false" data-allowed-file-extensions="doc docx ppt pptx pdf png rar zip" data-max-file-size="20M"/>
            </div>
          </div>

          <div class="form-group">
            <label>Status</label>
            <select name="is_published" class="form-control selectric" id="select_tag">
              <option value="0">Draft</option>
              <option value="1">Published</option>
            </select>
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

<div class="modal fade" id="EditFile" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
</div>
@endsection

@section('scriptlib')
<!-- JS Libraies -->
<script src="{{ asset('assets/modules/dropify/dist/js/dropify.js') }}"></script>
<script src="{{ asset('assets/modules/datatables/datatables.min.js') }}"></script>
<script src="{{ asset('assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/modules/sweetalert/sweetalert.min.js') }}"></script>
<script src="{{ asset('assets/modules/jquery-selectric/jquery.selectric.min.js') }}"></script>
<script src="{{ asset('assets/modules/select2/dist/js/select2.full.min.js') }}"></script>
@endsection

@section('scriptpage')
<!-- Page Specific JS File -->
<script src="{{ asset('assets/js/page/modules-datatables.js') }}"></script>
<script src="{{ asset('assets/js/views/file.js') }}"></script>
@endsection
