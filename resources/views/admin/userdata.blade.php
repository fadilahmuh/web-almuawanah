@extends('admin.appadmin')

@section('modalscontent')
 <!-- Modal User -->
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
        <div class="form-group">
          <label>Nama Lengkap</label>
          <input type="text" class="form-control">
        </div>
        <div class="form-group">
          <label>Email</label>
          <input type="text" class="form-control">
        </div>
        <div class="form-group">
          <label>Username</label>
          <input type="text" class="form-control">
        </div>
        <div class="form-group">
          <label>Password</label>
          <div class="input-group">
            <div class="input-group-prepend">
              <div class="input-group-text">
                <i class="fas fa-lock"></i>
              </div>
            </div>
            <input type="password" class="form-control pwstrength" data-indicator="pwindicator">
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
            <input type="password" class="form-control pwstrength" data-indicator="pwindicator">
          </div>
          <div id="pwindicator" class="pwindicator">
            <div class="bar"></div>
            <div class="label"></div>
          </div>
        </div>
        <div class="form-group">
          <label>Role</label>
          <select class="form-control selectric">
            <option>Superadmin</option>
            <option>Admin Yayasan</option>
            <option>Admin TKA/TPA</option>
            <option>Admin MTs</option>
            <option>Admin MA</option>
            <option>Admin Pondok Pesantren</option>
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
            <input type="text" class="form-control phone-number">
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
        <button type="button" class="btn btn-success">Simpan</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Delete -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Hapus Admin</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Apakah anda yakin untuk menghapus data ini?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
        <button type="button" class="btn btn-danger">Hapus</button>
      </div>
    </div>
  </div>
</div>
@endsection

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
@section('scriptline')