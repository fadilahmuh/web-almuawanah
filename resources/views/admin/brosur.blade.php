@extends('admin.appadmin')

@section('modalscontent')
@endsection

@section('maincontent')
<!-- Main Content -->
<div class="main-content">
    <section class="section">
      <div class="section-header">
          <h1>Brosur Website Al-Mu'awanah</h1>
      </div>
      <div class="section-body">
        <h2 class="section-title">Daftar Brosur</h2>
        <!-- Content -->
        <div class="row">
          <div class="col-12">
            <div class="card">
              <!-- Header Table -->
              <div class="card-header">
                <h4>Brosur  1</h4>              
              </div>
              <div class="card-body">
                <!-- Brosur Form -->
                <!-- Title -->
                <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Title</label>
                  <div class="col-sm-12 col-md-7">
                    <input type="text" class="form-control">
                  </div>
                </div>
                <!-- Text Area -->
                <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Content</label>
                  <div class="col-sm-12 col-md-7">
                    <textarea class="summernote-simple"></textarea>
                  </div>
                </div>
                <!-- Thumbnail -->
                <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Cover</label>
                  <div class="col-sm-12 col-md-auto">
                    <div id="image-preview" class="image-preview">
                      <label for="image-upload" id="image-label">Choose File</label>
                      <input type="file" name="image" id="image-upload" />
                    </div>                        
                  </div>
                  <ul>
                    <li>Gambar .png atau .jpg</li>
                    <li>Tidak mengandung Sara</li>
                  </ul>
                </div>                    
              </div>
              <!-- Buttons -->
              <div class="card-footer text-right">
                  <div class="buttons">
                      <button class="btn btn-danger">Hapus Brosur</button>
                      <button class="btn btn-success">Simpan Brosur</button>
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