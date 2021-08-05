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
  </section>
</div>
@endsection
@section('scriptline')
<script type="text/javascript"> 
    function display_c(){
    var refresh=1000; // Refresh rate in milli seconds
    mytime=setTimeout('display_ct()',refresh)
    }
    
    function display_ct() {
      var x = new Date()
      var x1=x.toUTCString();// changing the display to UTC string
      document.getElementById('datetime').innerHTML = x1;
      tt=display_c();
     }
</script>
@endsection