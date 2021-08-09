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
          <h1>Buat Postingan Baru</h1>
      </div>
      <div class="section-body">
        <!-- Content -->
        <div class="row mt-4">
          <div class="col-12">
            <div class="card">
              <div class="card-body">
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
                <div class="text-right">
                  <div>
                    <a href="#" class="btn btn-icon icon-right btn-success" data-toggle="modal" data-target="#blogModal">
                      <i class="fas fa-plus"></i> 
                      Simpan
                    </a>                        
                  </div>
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
