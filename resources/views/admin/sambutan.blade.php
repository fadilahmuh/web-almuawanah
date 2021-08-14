@extends('admin.appadmin')

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
              <form action="">
              <div class="card-body">
                <!-- Title -->
                <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Ucapan Pembuka</label>
                  <div class="col-sm-12 col-md-7">
                    <input type="text" class="form-control" disabled value="{{ $sambutan->judul}}">
                  </div>
                </div>
                <!-- Text Area -->
                <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Isi Sambutan</label>
                  <div class="col-sm-12 col-md-7">
                    <textarea class="form-control" name="content" id="" rows="5" disabled>{{ $sambutan->content}}</textarea>
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
                    <input type="text" class="form-control" value="{{ $sambutan->desc1}}" disabled>
                  </div>
                </div>
                <!-- Deskripsi Nama di bawah foto -->
                <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Deskripsi Foto<div>
                    <label>(Optional)</label>
                  </div></label>
                  <div class="col-sm-12 col-md-7">
                    <input type="text" class="form-control" value="{{ $sambutan->desc2}}" disabled>
                  </div>
                </div>
                <!-- Thumbnail -->
                <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Foto</label>
                  <div class="col-sm-12 col-md-auto">
                    <div id="image-preview" class="image-preview" style="background-image: url({{asset('uploads/component/')}}/{{$sambutan->attachment}});background-size: cover; background-position: center center;" >
                      <label for="image-upload" id="image-label">Choose File</label>
                      <input type="file" name="image" id="image-upload" disabled/>
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
                      <button class="cancel btn btn-danger collapse multi-collapse" data-toggle="collapse" data-target=".multi-collapse" ><i class="fas fa-times"></i> Cancel</button>
                      <button class="save btn btn-success collapse multi-collapse"><i class="far fa-save"></i> Simpan</button>
                      <button class="edit btn btn-warning collapse multi-collapse show" data-toggle="collapse" data-target=".multi-collapse" ><i class="fas fa-edit"></i> Edit</button>
                  </div>
              </div>
              </form>
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

  $(document).on("click", ".edit", function(e) {
    e.preventDefault();
    var inputs = $(this).parent().parent().parent().find(":input:not(:button)");
    console.log(inputs);
    inputs.removeAttr('disabled');
  });

  $(document).on("click", ".cancel", function(e) {
    e.preventDefault();
    var inputs = $(this).parent().parent().parent().find(":input:not(:button)");
    console.log(inputs);
    inputs.prop('disabled', true);
  });

</script>
@endsection