@extends('admin.appadmin')

@section('modalscontent')
<!-- Modal Create Blog -->
<div class="modal fade" id="blogModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
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
          <!-- Isi Blog -->
          <div class="form-group">
            <label>Isi Blog</label>
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
          <!-- Tags -->
          <div class="form-group">
            <label>Tags</label>
            <input type="text" class="form-control inputtags">
          </div>
          <!-- Status Blog -->
          <div class="form-group">
            <label>Status</label>
            <select class="form-control selectric">
              <option>Published</option>
              <option>Draft</option>
              <option>Pending</option>
              <option>Trash</option>
            </select>
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
@endsection

@section('maincontent')
<div class="main-content">
    <section class="section">
      <div class="section-header">
          <h1>Daftar Blog Website Al-Mu'awanah</h1>
      </div>
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
                <div class="float-left">
                  <select class="form-control selectric">
                    <option>Action For Selected</option>
                    <option>Move to Draft</option>
                    <option>Move to Pending</option>
                    <option>Delete Pemanently</option>
                  </select>
                </div>
                <div class="float-right">
                  <form>
                    <div class="input-group">
                      <input type="text" class="form-control" placeholder="Search">
                      <div class="input-group-append">
                        <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                      </div>
                    </div>
                  </form>
                </div>

                <div class="clearfix mb-3"></div>

                <div class="table-responsive">
                  <table class="table table-striped">
                    <tr>
                      <th class="text-center pt-2">
                        <div class="custom-checkbox custom-checkbox-table custom-control">
                          <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad" class="custom-control-input" id="checkbox-all">
                          <label for="checkbox-all" class="custom-control-label">&nbsp;</label>
                        </div>
                      </th>
                      <th>Judul</th>
                      <th>Tag</th>
                      <th>Penulis</th>
                      <th>Tanggal Dibuat</th>
                      <th>Status</th>
                    </tr>
                    <tr>
                      <td>
                        <div class="custom-checkbox custom-control">
                          <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-2">
                          <label for="checkbox-2" class="custom-control-label">&nbsp;</label>
                        </div>
                      </td>
                      <td>Laravel 5 Tutorial: Introduction
                        <div class="table-links">
                          <a href="#">View</a>
                          <div class="bullet"></div>
                          <a href="#">Edit</a>
                          <div class="bullet"></div>
                          <a href="#" class="text-danger">Trash</a>
                        </div>
                      </td>
                      <td>
                        <a href="#">Web Developer</a>,
                        <a href="#">Tutorial</a>
                      </td>
                      <td>
                        <a href="#">
                          <img alt="image" src="{{ asset('adminAssets/img/avatar/avatar-5.png') }}" class="rounded-circle" width="35" data-toggle="title" title=""> <div class="d-inline-block ml-1">Rizal Fakhri</div>
                        </a>
                      </td>
                      <td>2018-01-20</td>
                      <td><div class="badge badge-primary">Published</div></td>
                    </tr>
                    <tr>
                      <td>
                        <div class="custom-checkbox custom-control">
                          <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-3">
                          <label for="checkbox-3" class="custom-control-label">&nbsp;</label>
                        </div>
                      </td>
                      <td>Laravel 5 Tutorial: Installing
                        <div class="table-links">
                          <a href="#">View</a>
                          <div class="bullet"></div>
                          <a href="#">Edit</a>
                          <div class="bullet"></div>
                          <a href="#" class="text-danger">Trash</a>
                        </div>
                      </td>
                      <td>
                        <a href="#">Web Developer</a>,
                        <a href="#">Tutorial</a>
                      </td>
                      <td>
                        <a href="#">
                          <img alt="image" src="{{ asset('adminAssets/img/avatar/avatar-5.png') }}" class="rounded-circle" width="35" data-toggle="title" title=""> <div class="d-inline-block ml-1">Rizal Fakhri</div>
                        </a>
                      </td>
                      <td>2018-01-20</td>
                      <td><div class="badge badge-primary">Published</div></td>
                    </tr>
                    <tr>
                      <td>
                        <div class="custom-checkbox custom-control">
                          <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-4">
                          <label for="checkbox-4" class="custom-control-label">&nbsp;</label>
                        </div>
                      </td>
                      <td>Laravel 5 Tutorial: MVC
                        <div class="table-links">
                          <a href="#">View</a>
                          <div class="bullet"></div>
                          <a href="#">Edit</a>
                          <div class="bullet"></div>
                          <a href="#" class="text-danger">Trash</a>
                        </div>
                      </td>
                      <td>
                        <a href="#">Web Developer</a>,
                        <a href="#">Tutorial</a>
                      </td>
                      <td>
                        <a href="#">
                          <img alt="image" src="{{ asset('adminAssets/img/avatar/avatar-5.png') }}" class="rounded-circle" width="35" data-toggle="title" title=""> <div class="d-inline-block ml-1">Rizal Fakhri</div>
                        </a>
                      </td>
                      <td>2018-01-20</td>
                      <td><div class="badge badge-primary">Published</div></td>
                    </tr>
                    <tr>
                      <td>
                        <div class="custom-checkbox custom-control">
                          <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-5">
                          <label for="checkbox-5" class="custom-control-label">&nbsp;</label>
                        </div>
                      </td>
                      <td>Laravel 5 Tutorial: CRUD
                        <div class="table-links">
                          <a href="#">View</a>
                          <div class="bullet"></div>
                          <a href="#">Edit</a>
                          <div class="bullet"></div>
                          <a href="#" class="text-danger">Trash</a>
                        </div>
                      </td>
                      <td>
                        <a href="#">Web Developer</a>,
                        <a href="#">Tutorial</a>
                      </td>
                      <td>
                        <a href="#">
                          <img alt="image" src="{{ asset('adminAssets/img/avatar/avatar-5.png') }}" class="rounded-circle" width="35" data-toggle="title" title=""> <div class="d-inline-block ml-1">Rizal Fakhri</div>
                        </a>
                      </td>
                      <td>2018-01-20</td>
                      <td><div class="badge badge-danger">Draft</div></td>
                    </tr>
                    <tr>
                      <td>
                        <div class="custom-checkbox custom-control">
                          <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-1">
                          <label for="checkbox-1" class="custom-control-label">&nbsp;</label>
                        </div>
                      </td>
                      <td>Laravel 5 Tutorial: Deployment
                        <div class="table-links">
                          <a href="#">View</a>
                          <div class="bullet"></div>
                          <a href="#">Edit</a>
                          <div class="bullet"></div>
                          <a href="#" class="text-danger">Trash</a>
                        </div>
                      </td>
                      <td>
                        <a href="#">Web Developer</a>,
                        <a href="#">Tutorial</a>
                      </td>
                      <td>
                        <a href="#">
                          <img alt="image" src="{{ asset('adminAssets/img/avatar/avatar-5.png') }}" class="rounded-circle" width="35" data-toggle="title" title=""> <div class="d-inline-block ml-1">Rizal Fakhri</div>
                        </a>
                      </td>
                      <td>2018-01-20</td>
                      <td><div class="badge badge-warning">Pending</div></td>
                    </tr>
                  </table>
                </div>
                <div class="float-right">
                  <nav>
                    <ul class="pagination">
                      <li class="page-item disabled">
                        <a class="page-link" href="#" aria-label="Previous">
                          <span aria-hidden="true">&laquo;</span>
                          <span class="sr-only">Previous</span>
                        </a>
                      </li>
                      <li class="page-item active">
                        <a class="page-link" href="#">1</a>
                      </li>
                      <li class="page-item">
                        <a class="page-link" href="#">2</a>
                      </li>
                      <li class="page-item">
                        <a class="page-link" href="#">3</a>
                      </li>
                      <li class="page-item">
                        <a class="page-link" href="#" aria-label="Next">
                          <span aria-hidden="true">&raquo;</span>
                          <span class="sr-only">Next</span>
                        </a>
                      </li>
                    </ul>
                  </nav>
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
