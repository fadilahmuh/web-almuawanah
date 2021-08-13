@extends('admin.appadmin')

@section('csslib')
<link rel="stylesheet" href="{{ asset('adminAssets/modules/datatables/datatables.min.css') }}">
<link rel="stylesheet" href="{{ asset('adminAssets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('adminAssets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css') }}">
@endsection

@section('maincontent')
<div class="main-content">
    <section class="section">
      <div class="section-header">
          <h1>Daftar Blog Website Al-Mu'awanah</h1>
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
        <h2 class="section-title">Tabel Data Blog</h2>
        <!-- Content -->
        <div class="row mt-4">
          <div class="col-12">
            <div class="card">
              <div class="card-body">
                <div class="text-right">
                  <div>
                    <a href="{{route('blog.create')}}" class="btn btn-icon icon-right btn-success">
                      <i class="fas fa-plus"></i> 
                      Tambah Blog
                    </a>                        
                  </div>
                </div>
                <br>
                
                <div class="clearfix mb-3"></div>                

                <div class="table-responsive">
                  <table class="table table-striped" id="table-blog">
                    <thead  class="text-center">
                      <tr>
                        {{-- <th>id</th> --}}
                        <th>Judul</th>
                        <th>Tag</th>
                        <th>Penulis</th>
                        <th>Tanggal Dibuat</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody class="text-center">
                      @foreach($blog as $b)
                      <tr>
                        {{-- <td class="align-middle">{{ $b->id }}</td> --}}
                        <td class="align-middle">{{ $b->judul }}</td>
                        <td class="align-middle"><div class="badges">@foreach($b->tag as $t)<a href="" class="badge badge-primary">{{ $t }}</a>@endforeach</div></td>
                        <td class="align-middle">{{ $b->users->name }}</td>
                        <td class="align-middle">{{ $b->created_at }}</td>
                        <td class="align-middle">
                          @if ($b->is_published == 1 )
                          <a href=""  class="badge badge-success text-white">Published</a>
                          @else
                          <a href="" class="badge badge-warning text-white">Draft</a>
                          @endif
                        </td>
                        <td class="align-middle">
                          <div class="btn-toolbar justify-content-center" role="group">
                            <a href="#" class="btn btn-icon btn-info" data-toggle="tooltip" data-placement="top" title="" data-original-title="Preview"><i class="fas fa-eye"></i></a>
                            <a href="{{ route('blog.edit', [$b->slug]) }}" class="btn btn-icon btn-warning" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class="fas fa-edit"></i></a>
                            <form action="{{ route('blog.destroy', [$b->id]) }}" method="POST">                              
                              @csrf
                              @method('delete')
                              <button class="del btn btn-icon btn-danger" data-judul="{{ $b->judul }}" data-toggle="tooltip" data-placement="top" title="" data-original-title="Hapus"><i class="fas fa-trash"></i></button>
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
          <div class="col-12 col-md-6 col-lg-6">
            <div class="card">
              <div class="card-header">
                <h4>Post Tag</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-bordered table-md">
                    <tbody><tr>
                      <th>#</th>
                      <th>Tag</th>
                      <th>Action</th>
                    </tr>                    
                      @if ($tags->count() == 0)
                      <tr>
                      <td colspan="3" class="table-active text-center">No Tags Data</td>                        
                    </tr>  
                      @else
                      @foreach ($tags as $t)
                      <tr>
                      <td>{{ $t->id }}</td>
                      <td>{{ $t->nama }}</td>
                      <td class="text-center">
                        <form action="{{ route('deltag', [$t->id]) }}" method="POST">                              
                          @csrf
                          @method('delete')  
                          <button class="del2 btn btn-danger" data-nama="{{ $t->nama }}"><i class="fas fa-trash"></i></button>
                        </form>                        
                      </td>                        
                    </tr>  
                      @endforeach
                      @endif
                                     
                  </tbody></table>
                </div>
              </div>
              <div class="card-footer text-right">
                <a href="" class="btn btn-icon icon-right btn-success" data-toggle="modal" data-target="#tagModal">
                  <i class="fas fa-plus"></i> 
                  Tambah Tag
                </a>
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
      <!-- Modal Create Blog -->
      <div class="modal fade" id="tagModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Tambah Tag</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="{{ route('newtag') }}" method="POST" enctype="multipart/form-data">
              @csrf
            <!-- Judul -->
            <div class="modal-body">              
              <div class="form-group">
                <label>Nama Tag</label>
                <input type="text" class="form-control" name="nama" id="nama">
              </div>              
            </div>
            <div class="modal-footer">
              <button type="" class="btn btn-success">Simpan</button>
            </div>
            </form>
          </div>
        </div>
      </div>
@endsection

@section('scriptlib')
<!-- JS Libraies -->
<script src="{{ asset('adminAssets/modules/datatables/datatables.min.js') }}"></script>
<script src="{{ asset('adminAssets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('adminAssets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js') }}"></script>
<script src="{{ asset('adminAssets/modules/sweetalert/sweetalert.min.js') }}"></script>
@endsection

@section('scriptpage')
<!-- Page Specific JS File -->
<script src="{{ asset('adminAssets/js/page/modules-datatables.js') }}"></script>
@endsection

@section('scriptline')
  <script>
    $('.del').click(function(event) {
      var form =  $(this).closest("form");
      console.log(form);
      var judul = $(this).data("judul");
      event.preventDefault();
      swal({
          title: `Hapus postingan "${judul}?"`,
          text: "Jika postingan ini dihapus maka tidak dapat dikembalikan lagi.",
          icon: "warning",
          buttons: true,
          dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          form.submit();
        }
      });
  });

  $('.del2').click(function(event) {
      var form =  $(this).closest("form");
      var nama = $(this).data("nama");
      event.preventDefault();
      swal({
          title: `Hapus Tag "${nama}?"`,
          icon: "warning",
          buttons: true,
          dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          form.submit();
        }
      });
  });
  </script>
@endsection