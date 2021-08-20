@extends('admin.appadmin')
@section('csslib')
<link rel="stylesheet" href="{{ asset('adminAssets/modules/datatables/datatables.min.css') }}">
<link rel="stylesheet" href="{{ asset('adminAssets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('adminAssets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('adminAssets/modules/jquery-selectric/selectric.css') }}">
@endsection

@include('admin.modal.userdatamodal')

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
                      <td class="align-middle"><div class="badge badge-success roleAdmin">@foreach($u->roles as $p) {{ $p->name }}@endforeach</div></td>
                      <td>
                        <div class="btn-toolbar justify-content-center" role="group">
                          <a href="" data-attr="" class="btn btn-icon btn-warning editModal" data-toggle="modal" data-target="#editUserModal"><i class="fas fa-edit"></i></a>
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

@section('scriptlib')
<!-- JS Libraies -->
<script src="{{ asset('adminAssets/modules/datatables/datatables.min.js') }}"></script>
<script src="{{ asset('adminAssets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('adminAssets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js') }}"></script>
<script src="{{ asset('adminAssets/modules/jquery-ui/jquery-ui.min.js') }}"></script>
<script src="{{ asset('adminAssets/modules/jquery-selectric/jquery.selectric.min.js') }}"></script>
<script src="{{ asset('adminAssets/modules/sweetalert/sweetalert.min.js') }}"></script>

@endsection

@section('scriptpage')
<!-- Page Specific JS File -->
<script src="{{ asset('adminAssets/js/page/modules-datatables.js') }}"></script>
<script src="{{ asset('adminAssets/js/views/userdata.js') }}"></script>
@endsection