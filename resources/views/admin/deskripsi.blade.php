@extends('admin.appadmin')

@section('modalscontent')
@endsection

@section('maincontent')
<!-- Main Content -->
<div class="main-content">
    <section class="section">
      <div class="section-header">
          <h1>Deskripsi Singkat Al-Mu'awanah</h1>
      </div>
      <div class="section-body">
        <h2 class="section-title">Deskripsi</h2>
        <!-- Content -->
        <div class="row">
          <div class="col-12">
            <div class="card">
              <!-- Header Table -->
              <!-- <div class="card-header">
                <h4>Banner 1</h4>              
              </div> -->
              <div class="card-body">
                <!-- Banner Form -->                    
                <!-- Isi Sambutan -->
                <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                    Isi Deskripsi Singkat
                  </label>
                  <div class="col-sm-12 col-md-7">
                    <textarea class="summernote-simple"></textarea>
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
                    <li>Ukuran 108px x 32px</li>
                  </ul>
                </div>                    
              </div>
              <!-- Buttons -->
              <div class="card-footer text-right">
                  <div class="buttons">
                      <button class="btn btn-warning">Update Deskripsi</button>
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