@extends('admin.appadmin')

@section('maincontent')
 <!-- Main Content -->
 <div class="main-content">
    <section class="section">
      <div class="section-header">
          <h1>Banner Al-Mu'awanah</h1>
      </div>
      <div class="section-body">
        <h2 class="section-title">Halaman Awal</h2>
        
        <div class="row">          
          <div class="col-12 collapse multi-collapse" id="newbanner" >
            <div class="card">
              <!-- Header Table -->
              <div class="card-header">
                <h4>Tambah Banner</h4>
                <div class="card-header-action">
                  <button class="btn btn-icon btn-danger" data-toggle="collapse" data-target=".multi-collapse" aria-expanded="false" aria-controls="newbanner"><i class="fas fa-times"></i></button>
                </div>
              </div>
              <div class="card-body">
                <!-- Banner Form -->
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
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
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
                </div>                    
              </div>
              <!-- Buttons -->
              <div class="card-footer text-right">
                  <div class="buttons">
                      <button class="btn btn-success">Simpan Banner</button>
                  </div>
              </div>
            </div>
          </div>
          <div class="col-12 text-center multi-collapse collapse show" >    
            <button type="button" class="btn btn-primary rounded-pill" data-toggle="collapse" data-target=".multi-collapse" aria-expanded="false" aria-controls="newbanner"><i class="fas fa-plus" style="font-size: 3rem"></i></button>    
          </div>         
        </div>            
      </div>
    </section>
  </div>
</div>
@endsection

@section('scriptline')

@endsection