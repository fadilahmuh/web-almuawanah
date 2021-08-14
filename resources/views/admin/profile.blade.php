@extends('admin.appadmin')

@section('csslib')
  <!-- CSS Libraries -->  
  <link rel="stylesheet" href="{{ asset('adminAssets/modules/summernote/summernote.min.css') }}">
@endsection

@section('modalscontent')
@endsection

@section('maincontent')
<!-- Main Content -->
<div class="main-content">
    <section class="section">
      <div class="section-header">
          <h1>Profil Website Al-Mu'awanah</h1>
      </div>
      <div class="section-body">
        <h2 class="section-title">Data Profil</h2>

        <!-- Tentang Kami -->
        <div class="row">
          <div class="col-12">
            <div class="card">
              <!-- Header Table -->
              <div class="card-header">
                <h4>Tentang Kami</h4>              
              </div>
              <div class="card-body">
                <!-- Banner Form -->     

                <!-- Text Area -->
                <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Isi Tentang Yayasan Al-Mu'awanah</label>
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
                    <li>Ukuran 32px x 32px</li>
                  </ul>
                </div>                    
              </div>
              <!-- Buttons -->
              <div class="card-footer text-right">
                  <div class="buttons">
                      <button class="btn btn-warning">Update Tentang Kami</button>
                  </div>
              </div>
            </div>
          </div>
        </div> 

        <!-- Visi -->
        <div class="row">
          <div class="col-12">
            <div class="card">
              <!-- Header Table -->
              <div class="card-header">
                <h4>Visi</h4>              
              </div>
              <div class="card-body">
                <!-- Banner Form -->
                
                <!-- Text Area -->
                <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Isi Visi Yayasan Al-Mu'awanah</label>
                  <div class="col-sm-12 col-md-7">
                    <textarea class="summernote-simple"></textarea>
                  </div>
                </div>                                       
              </div>
              <!-- Buttons -->
              <div class="card-footer text-right">
                  <div class="buttons">
                      <button class="btn btn-warning">Update Visi</button>
                  </div>
              </div>
            </div>
          </div>
        </div>   
        
        <!-- Misi -->
        <div class="row">
          <div class="col-12">
            <div class="card">
              <!-- Header Table -->
              <div class="card-header">
                <h4>Misi</h4>              
              </div>
              <div class="card-body">
                <!-- Banner Form -->
                
                <!-- Text Area -->
                <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Isi Misi Yayasan Al-Mu'awanah</label>
                  <div class="col-sm-12 col-md-7">
                    <textarea class="summernote-simple"></textarea>
                  </div>
                </div>                                       
              </div>
              <!-- Buttons -->
              <div class="card-footer text-right">
                  <div class="buttons">
                      <button class="btn btn-warning">Update Misi</button>
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
<script src="{{ asset('adminAssets/modules/summernote/summernote.min.js') }}"></script>
@endsection