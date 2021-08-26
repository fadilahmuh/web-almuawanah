@extends('admin.appadmin')
@section('csslib')
<link rel="stylesheet" href="{{ asset('assets/modules/datatables/datatables.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/modules/jquery-selectric/selectric.css') }}">
@endsection

{{-- @include('admin.modal.userdatamodal') --}}

@section('maincontent')
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
        <h1>Daftar Admin Web Al-Mu'awanah</h1>
    </div>    
    <div class="section-body">
      <h2 class="section-title">Tabel Data</h2>  
      @if(Session::has('success'))
      <div class="alert alert-success" role="alert">
        <i class="fas fa-check mr-3"></i> {{ Session('success') }} 
      </div>        
      @endif 
      @if ($errors->any())
      <div class="alert alert-danger" role="alert">
        <i class="fas fa-exclamation-triangle  mr-3"></i> Gagal mengubah data!!
      </div> 
      @endif   
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
                  <a href="#" class="btn btn-icon icon-right btn-success" data-toggle="modal" data-target="#userModal">
                    <i class="fas fa-plus"></i> 
                    Tambah Admin
                  </a>                        
                </div>
                
              </div>
              <br>
              <!-- Admin Table -->
              <div class="table-responsive">
                <table id="datatable" class="table table-striped" id="table-1">
                  <thead  class="text-center">
                    <tr>
                      <th>
                        id
                      </th>
                      <th>Nama Lengkap</th>
                      <th>E-Mail</th>
                      <th>No Handphone</th>
                      <th>Role</th>
                      <th>Action    </th>
                    </tr>
                  </thead>
                  <tbody class="text-center">
                    @foreach($nonmembers as $u)
                    <tr>
                      <td class="align-middle">{{ $u->id }}</td>
                      <td class="text-left align-middle">{{ $u->name }}</td>
                      <td class="align-middle">{{ $u->email }}</td>
                      <td class="align-middle">{{ $u->no_hp }}</td>
                      <td class="align-middle"><div class="badge badge-success">@foreach($u->roles as $p) {{ $p->name }}@endforeach</div></td>
                      <td>
                        <div class="btn-toolbar justify-content-center" role="group">
                          <a href="" class="edit btn btn-icon btn-warning" data-id="{{ $u->id }}"  data-toggle="tooltip" data-placement="top" data-url="{{route('userdata.show',[$u->id])}}" data-original-title="Edit"><i class="fas fa-edit"></i></a>
                          <form action="{{ route('userdata.destroy', [$u->id]) }}" method="POST">                              
                            @csrf
                            @method('delete')
                            <button class="del btn btn-icon btn-danger" data-name="{{ $u->name }}" data-toggle="tooltip" data-placement="top" title="" data-original-title="Hapus"><i class="fas fa-trash"></i></button>
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
@endsection

@section('modalscontent')
<div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Admin</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        @foreach($errors->getMessages() as $this_error)
        <div class="alert alert-danger" role="alert">
          <i class="fas fa-exclamation-triangle  mr-3"></i> {{$this_error[0]}}
        </div> 
        @endforeach
        <br>
        <form action="{{ route('userdata.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <label>Nama Lengkap</label>
          <input type="text" name="name" class="form-control" value="{{old('name')}}">          
        </div>
        <div class="form-group">
          <label>Email</label>
          <input type="text" name="email" class="form-control" value="{{old('email')}}">
        </div>
        <div class="form-group">
          <label>Password</label>
          <div class="input-group">
            <div class="input-group-prepend">
              <div class="input-group-text">
                <i class="fas fa-lock"></i>
              </div>
            </div>
            <input type="password" name="password" class="form-control pwstrength" data-indicator="pwindicator">
          </div>
          <div id="pwindicator" class="pwindicator">
            <div class="bar"></div>
            <div class="label"></div>
          </div>
        </div>
        <div class="form-group">
          <label>Confirm Password</label>
          <div class="input-group">
            <div class="input-group-prepend">
              <div class="input-group-text">
                <i class="fas fa-lock"></i>
              </div>
            </div>
            <input type="password" name="password_confirmation" class="form-control pwstrength" data-indicator="pwindicator">
          </div>
          <div id="pwindicator" class="pwindicator">
            <div class="bar"></div>
            <div class="label"></div>
          </div>
        </div>
        <div class="form-group">
          <label>Role</label>
          <select name="role" class="form-control">
            <option value="admin_yys">Admin Yayasan</option>
            <option value="admin_tka">Admin TKA/TPA</option>
            <option value="admin_ra">Admin Ra</option>
            <option value="admin_mts">Admin MTs</option>
            <option value="admin_ma">Admin MA</option>
            <option value="admin_pst">Admin Pondok Pesantren</option>
          </select>
        </div>
        <div class="form-group">
          <label>Nomor Hp</label>
          <div class="input-group">
            <div class="input-group-prepend">
              <div class="input-group-text">
                <i class="fas fa-phone"></i>
              </div>
            </div>
            <input type="text" name="no_hp" class="form-control phone-number" value="{{old('no_hp')}}">
          </div>
        </div>      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
        <button type="" class="btn btn-success">Simpan</button>
      </div>
    </form>
    </div>
  </div>
</div>

<div class="modal fade" id="editUser" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
</div>
@endsection

@section('scriptlib')
<!-- JS Libraies -->
<script src="{{ asset('assets/modules/datatables/datatables.min.js') }}"></script>
<script src="{{ asset('assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js') }}"></script>
<script src="{{ asset('assets/modules/jquery-ui/jquery-ui.min.js') }}"></script>
<script src="{{ asset('assets/modules/jquery-selectric/jquery.selectric.min.js') }}"></script>
<script src="{{ asset('assets/modules/sweetalert/sweetalert.min.js') }}"></script>
@endsection


@section('scriptpage')
<!-- Page Specific JS File -->
<script src="{{ asset('assets/js/page/modules-datatables.js') }}"></script>
<script src="{{ asset('assets/js/views/userdata.js') }}"></script>
@endsection