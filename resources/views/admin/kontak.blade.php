@extends('admin.appadmin')

@section('modalscontent')
@endsection

@section('maincontent')
<!-- Main Content -->
<div class="main-content">
    <section class="section">
      <div class="section-header">
          <h1>Kontak Yayasan Al-Mu'awanah</h1>
      </div>
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
                        <th>
                          No
                        </th>
                        <th class="text-left col-3">Jenis Kontak</th>
                        <th>Isi kontak</th>
                        <th class="col-2">Action</th>
                      </tr>
                    </thead>
                    <tbody class="text-center">
                      <tr>
                        <td>
                          1
                        </td>
                        <td class="text-left">Whatsapp 1</td>
                        <td class="align-middle">
                          081222xxxxxx
                        </td>
                        <td>
                          <div class="buttons">
                            <a href="#" class="btn btn-icon btn-warning" data-toggle="modal" data-target="#galeryModal"><i class="fas fa-edit"></i></a>
                            <a href="#" class="btn btn-icon btn-danger"data-toggle="modal" data-target="#deleteModal"><i class="fas fa-trash"></i></a>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          2
                        </td>
                        <td class="text-left">E-mail 2</td>
                        <td class="align-middle">
                          example@gmail.com
                        </td>
                        <td>
                          <div class="buttons">
                            <a href="#" class="btn btn-icon btn-warning" data-toggle="modal" data-target="#galeryModal"><i class="fas fa-edit"></i></a>
                            <a href="#" class="btn btn-icon btn-danger"data-toggle="modal" data-target="#deleteModal"><i class="fas fa-trash"></i></a>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          3
                        </td>
                        <td class="text-left">No Telephone 3</td>
                        <td class="align-middle">
                          +62 81222444xxx
                        </td>
                        <td>
                          <div class="buttons">
                            <a href="#" class="btn btn-icon btn-warning" data-toggle="modal" data-target="#galeryModal"><i class="fas fa-edit"></i></a>
                            <a href="#" class="btn btn-icon btn-danger"data-toggle="modal" data-target="#deleteModal"><i class="fas fa-trash"></i></a>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          4
                        </td>
                        <td class="text-left">Alamat 4</td>
                        <td class="align-middle">
                          Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum voluptas dicta, magnam amet iure exercitationem natus ea laboriosam, fuga praesentium vel doloremque molestias et eaque eveniet, facere deleniti ad harum.
                        </td>
                        <td>                              
                          <div class="buttons">
                            <a href="#" class="btn btn-icon btn-warning" data-toggle="modal" data-target="#galeryModal"><i class="fas fa-edit"></i></a>
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
</div>
@endsection

@section('scriptline')
@endsection