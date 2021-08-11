@extends('admin.appadmin')

@section('modalscontent')
@endsection

@section('maincontent')
<!-- Main Content -->
<div class="main-content">
    <section class="section">
      <div class="section-header">
          <h1>Sambutan Al-Mu'awanah</h1>
      </div>
      <div class="section-body">
        <h2 class="section-title">Ucapan Pembuka</h2>
        <!-- Content Form Editor -->
        <div class="row">
          <div class="col-12">
            <div class="card">
              <!-- Header Table -->
              <!-- <div class="card-header">
                <h4>Banner 1</h4>              
              </div> -->
              <div class="card-body">
                <!-- Banner Form -->
                <!-- Title -->
                <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Ucapan Pembuka</label>
                  <div class="col-sm-12 col-md-7">
                    <input type="text" class="form-control">
                  </div>
                </div>
                <!-- Text Area -->
                <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Isi Sambutan</label>
                  <div class="col-sm-12 col-md-7">
                    <textarea class="summernote-simple"></textarea>
                  </div>
                </div>
                <!-- Nama di Bawah Foto -->
                <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                    Nama Foto
                    <div>
                      <label>(Optional)</label>
                    </div>
                  </label>
                  <div class="col-sm-12 col-md-7">
                    <input type="text" class="form-control">
                  </div>
                </div>
                <!-- Deskripsi Nama di bawah foto -->
                <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Deskripsi Foto<div>
                    <label>(Optional)</label>
                  </div></label>
                  <div class="col-sm-12 col-md-7">
                    <input type="text" class="form-control">
                  </div>
                </div>
                <!-- Thumbnail -->
                <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Foto</label>
                  <div class="col-sm-12 col-md-auto">
                    <div id="image-preview" class="image-preview">
                      <label for="image-upload" id="image-label">Choose File</label>
                      <input type="file" name="image" id="image-upload" />
                    </div>                        
                  </div>
                  <ul>
                    <li>Gambar .png atau .jpg</li>
                    <li>Ukuran 32px x 32px</li>
                  </ul>
                </div>                    
              </div>
              <!-- Buttons -->
              <div class="card-footer text-right">
                  <div class="buttons">
                      <button class="btn btn-warning">Update Sambutan</button>
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