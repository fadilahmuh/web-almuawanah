@extends('admin.appadmin')

@section('modalscontent')
<!-- Modal Add Galery -->
<div class="modal fade" id="galeryModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Blog</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <!-- Judul -->
        <div class="modal-body">
          <div class="form-group">
            <label>Judul</label>
            <input type="text" class="form-control">
          </div>
          <!-- Deskripsi -->
          <div class="form-group">
            <label>Deskripsi</label>
            <textarea class="summernote-simple"></textarea>
          </div>
          <!-- Gambar -->
          <div class="form-group">
            <label>Gambar Cover</label>
            <div class="col-sm-12 col-md-auto">
              <div id="image-preview" class="image-preview">
                <label for="image-upload" id="image-label">Choose File</label>
                <input type="file" name="image" id="image-upload" />
              </div>
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
</div>

  <!-- Modal Delete -->
  <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Hapus Foto</h5>
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
</div>
@endsection

@section('maincontent')
<!-- Main Content -->
<div class="main-content">
    <section class="section">
      <div class="section-header">
          <h1>Galeri Website Al-Mu'awanah</h1>
      </div>
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
                <!-- Admin Table -->
                <div class="table-responsive">
                  <table class="table table-striped" id="table-1">
                    <thead  class="text-center">
                      <tr>
                        <th>
                          No
                        </th>
                        <th class="text-left col-2">Nama</th>
                        <th class="col-5">Deskripsi</th>
                        <th class="col-2">Gambar</th>
                        <th class="col-2">Action</th>
                      </tr>
                    </thead>
                    <tbody class="text-center">
                      <tr>
                        <td>
                          1
                        </td>
                        <td class="text-left">Gambar 1</td>
                        <td class="align-middle">
                          Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum voluptas dicta, magnam amet iure exercitationem natus ea laboriosam, fuga praesentium vel doloremque molestias et eaque eveniet, facere deleniti ad harum.
                        </td>
                        <td>
                          <img class="img-galery" src="{{ asset('adminAssets/img/no-image.jpg') }}" alt="" srcset="">
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
                        <td class="text-left">Gambar 2</td>
                        <td class="align-middle">
                          Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum voluptas dicta, magnam amet iure exercitationem natus ea laboriosam, fuga praesentium vel doloremque molestias et eaque eveniet, facere deleniti ad harum.
                        </td>
                        <td>
                          <img class="img-galery" src="{{ asset('adminAssets/img/no-image.jpg') }}" alt="" srcset="">
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
                        <td class="text-left">Gambar 3</td>
                        <td class="align-middle">
                          Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum voluptas dicta, magnam amet iure exercitationem natus ea laboriosam, fuga praesentium vel doloremque molestias et eaque eveniet, facere deleniti ad harum.
                        </td>
                        <td>
                          <img class="img-galery" src="{{ asset('adminAssets/img/no-image.jpg') }}" alt="" srcset="">
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
                        <td class="text-left">Gambar 4</td>
                        <td class="align-middle">
                          Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum voluptas dicta, magnam amet iure exercitationem natus ea laboriosam, fuga praesentium vel doloremque molestias et eaque eveniet, facere deleniti ad harum.
                        </td>
                        <td>
                          <img class="img-galery" src="{{ asset('adminAssets/img/no-image.jpg') }}" alt="" srcset="">
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
                          5
                        </td>
                        <td class="text-left">Gambar 5</td>
                        <td class="align-middle">
                          Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum voluptas dicta, magnam amet iure exercitationem natus ea laboriosam, fuga praesentium vel doloremque molestias et eaque eveniet, facere deleniti ad harum.
                        </td>
                        <td>
                          <img class="img-galery" src="{{ asset('adminAssets/img/no-image.jpg') }}" alt="" srcset="">
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
        
        <h2 class="section-title">Youtube Channel</h2>
        <!-- Youtube Channel -->
        <div class="row">
          <div class="col-12">
            <div class="card">
              <!-- Header Table -->
              <div class="card-header">
                <h4></h4>              
              </div>
              <div class="card-body">
                <!-- Banner Form -->                    
                <!-- Isi Sambutan -->
                <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Youtube ID</label>
                  <div class="col-sm-12 col-md-7">
                    <input type="text" class="form-control">
                  </div>
                </div>           
              </div>
              <!-- Buttons -->
              <div class="card-footer text-right">
                  <div class="buttons">
                      <button class="btn btn-warning">Update Youtube</button>
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

@section('scriptline')
@endsection