@extends('admin.appadmin')

@section('maincontent')
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
        <h1>Daftar Admin Web Al-Mu'awanah</h1>
    </div>
    <div class="section-body">
      <h2 class="section-title">Tabel Data</h2>
      
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
                <table class="table table-striped" id="table-1">
                  <thead  class="text-center">
                    <tr>
                      <th>
                        No
                      </th>
                      <th>Nama Lengkap</th>
                      <th>E-Mail</th>
                      <th>No Handphone</th>
                      <th>Role</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody class="text-center">
                    <tr>
                      <td>
                        1
                      </td>
                      <td class="text-left">Nama Admin 1</td>
                      <td class="align-middle">
                        example@gmail.com
                      </td>
                      <td>
                        081332xxxxxx
                      </td>
                      <td><div class="badge badge-success">Superadmin</div></td>
                      <td>
                        <div class="buttons">
                          <a href="#" class="btn btn-icon btn-warning" data-toggle="modal" data-target="#userModal"><i class="fas fa-edit"></i></a>
                          <a href="#" class="btn btn-icon btn-danger"data-toggle="modal" data-target="#deleteModal"><i class="fas fa-trash"></i></a>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        2
                      </td>
                      <td class="text-left">Nama Admin 2</td>
                      <td class="align-middle">
                        example@gmail.com
                      </td>
                      <td>
                        081332xxxxxx
                      </td>
                      <td><div class="badge badge-primary">Yayan Al-Mu'amanah</div></td>
                      <td>
                        <div class="buttons">
                          <a href="#" class="btn btn-icon btn-warning" data-toggle="modal" data-target="#userModal"><i class="fas fa-edit"></i></a>
                          <a href="#" class="btn btn-icon btn-danger"data-toggle="modal" data-target="#deleteModal"><i class="fas fa-trash"></i></a>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        3
                      </td>
                      <td class="text-left">Nama Admin 3</td>
                      <td class="align-middle">
                        example@gmail.com
                      </td>
                      <td>
                        081332xxxxxx
                      </td>
                      <td><div class="badge badge-light">Guru Mts</div></td>
                      <td>
                        <div class="buttons">
                          <a href="#" class="btn btn-icon btn-warning" data-toggle="modal" data-target="#userModal"><i class="fas fa-edit"></i></a>
                          <a href="#" class="btn btn-icon btn-danger"data-toggle="modal" data-target="#deleteModal"><i class="fas fa-trash"></i></a>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        4
                      </td>
                      <td class="text-left">Nama Admin 4</td>
                      <td class="align-middle">
                        example@gmail.com
                      </td>
                      <td>
                        081332xxxxxx
                      </td>
                      <td><div class="badge badge-light">Guru TKA/TPA</div></td>
                      <td>                              
                        <div class="buttons">
                          <a href="#" class="btn btn-icon btn-warning" data-toggle="modal" data-target="#userModal"><i class="fas fa-edit"></i></a>
                          <a href="#" class="btn btn-icon btn-danger"data-toggle="modal" data-target="#deleteModal"><i class="fas fa-trash"></i></a>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        5
                      </td>
                      <td class="text-left">Nama Admin 5</td>
                      <td class="align-middle">
                        example@gmail.com
                      </td>
                      <td>
                        081332xxxxxx
                      </td>
                      <td><div class="badge badge-warning">Pondok Pesantren</div></td>
                      <td>
                        <div class="buttons">
                          <a href="#" class="btn btn-icon btn-warning" data-toggle="modal" data-target="#userModal"><i class="fas fa-edit"></i></a>
                          <a href="#" class="btn btn-icon btn-danger"data-toggle="modal" data-target="#deleteModal"><i class="fas fa-trash"></i></a>
                        </div>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="card-footer text-right">
              <nav class="d-inline-block">
                <ul class="pagination mb-0">
                  <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1"><i class="fas fa-chevron-left"></i></a>
                  </li>
                  <li class="page-item active"><a class="page-link" href="#">1 <span class="sr-only">(current)</span></a></li>
                  <li class="page-item">
                    <a class="page-link" href="#">2</a>
                  </li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item">
                    <a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a>
                  </li>
                </ul>
              </nav>
            </div>
          </div>
        </div>
      </div>            
    </div>

    <div class="section-body">
      <ul class="listBox">
        @foreach($nonmembers as $u)
          <li>ID:{{ $u->id }}<a href=""> {{ $u->name }}</a>@foreach($u->roles as $p) {{ $p->name }}@endforeach </li>
        @endforeach
      </ul>
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
@endsection

@section('scriptpage')
<!-- Page Specific JS File -->
<script src="{{ asset('adminAssets/js/page/modules-datatables.js') }}"></script>
@endsection