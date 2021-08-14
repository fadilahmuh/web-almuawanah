@extends('admin.appadmin')

@section('csslib')
  <!-- CSS Libraries -->  
  <link rel="stylesheet" href="{{ asset('adminAssets/modules/dropify/dist/css/dropify.css') }}">
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
              <form action="">
              <div class="card-body">
                <!-- Banner Form -->                    
                <!-- Isi Sambutan -->
                <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                    Isi Deskripsi Singkat
                  </label>
                  <div class="col-sm-12 col-md-7">
                    <textarea class="form-control" name="content" id="" rows="5" disabled>{{$deskripsi->content}}</textarea>
                  </div>
                </div>
                
                <!-- Thumbnail -->
                <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Foto</label>
                  <div class="col-sm-12 col-md-7">
                    <input type="file" name="attachment" class="dropify" data-show-remove="false" data-height="300" disabled="disabled" data-default-file="{{asset('uploads/component/')}}/{{$deskripsi->attachment}}"/>
                    <ul>
                      <p class="mb-0">Rekomendasi:</p>
                      <li>Resolusi gambar tinggi (1920x1080)</li>
                      <li>Orientasi gambar Landscape</li>
                    </ul>
                  </div>                  
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
  <script src="{{ asset('adminAssets/modules/dropify/dist/js/dropify.js') }}"></script>
  <script src="{{ asset('adminAssets/modules/sweetalert/sweetalert.min.js') }}"></script>
@endsection

@section('scriptline')
<script>
    $('.dropify').dropify({
    messages: {
        'default': 'Tarik dan lepaskan file atau klik disini',
        'replace': 'Tarik dan lepaskan file atau klik disini untuk mengganti',
        'remove':  'Remove',
        'error':   'Ooops, kesalahan terjadi.'
    }
  }); 

  $(document).on("click", ".edit", function(e) {
    e.preventDefault();
    var inputs = $(this).parent().parent().parent().find(":input:not(:button)");
    var drop = $(this).parent().parent().parent().find(".dropify-wrapper");
    console.log(inputs);
    inputs.removeAttr('disabled');
    drop.removeClass('disabled');
  });

  $(document).on("click", ".cancel", function(e) {
    e.preventDefault();
    var inputs = $(this).parent().parent().parent().find(":input:not(:button)");
    var drop = $(this).parent().parent().parent().find(".dropify-wrapper");
    console.log(inputs);
    inputs.prop('disabled', true);
    drop.addClass('disabled');
  });
</script>
@endsection