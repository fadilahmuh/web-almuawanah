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
                    <textarea class="form-control" name="content" id="" rows="5"></textarea>
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
                    <p class="mb-0">Rekomendasi:</p>
                    <li>Gambar .png atau .jpg</li>
                    <li>Bentuk gambar persegi (1080x1080)</li>
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

@section('scriptlib')
  <!-- JS Libraies -->  
  <script src="{{ asset('adminAssets/modules/upload-preview/assets/js/jquery.uploadPreview.min.js') }}"></script>
@endsection

@section('scriptline')
<script>
  $.uploadPreview({
  input_field: "#image-upload",   // Default: .image-upload
  preview_box: "#image-preview",  // Default: .image-preview
  label_field: "#image-label",    // Default: .image-label
  label_default: "Pilih File",   // Default: Choose File
  label_selected: "Ganti File",  // Default: Change File
  no_label: false,                // Default: false
  success_callback: null          // Default: null
});
</script>
@endsection