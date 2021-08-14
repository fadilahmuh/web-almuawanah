@extends('admin.appadmin')

@section('csslib')
  <!-- CSS Libraries -->  
  <link rel="stylesheet" href="{{ asset('adminAssets/modules/summernote/summernote.min.css') }}">
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
              <form action="">
              <!-- Header Table -->
              <div class="card-header">
                <h4>Tentang Kami</h4>              
              </div>
              <div class="card-body">  
                <!-- Text Area -->
                <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Isi Tentang Yayasan Al-Mu'awanah</label>
                  <div class="col-sm-12 col-md-7">
                    <textarea id="tentang" class="summernote-simple"></textarea>
                  </div>
                </div>                                  
              </div>
              <!-- Buttons -->
              <div class="card-footer text-right">
                <div class="buttons">
                    <button class="cancel btn btn-danger collapse" data-toggle="collapse" data-target=".multi-collapse" ><i class="fas fa-times"></i> Cancel</button>
                    <button class="save btn btn-success collapse"><i class="far fa-save"></i> Simpan</button>
                    <button class="edit btn btn-warning collapse show" data-toggle="collapse" data-target=".multi-collapse" ><i class="fas fa-edit"></i> Edit</button>
                </div>
              </div>
            </form>
            </div>
          </div>
        </div> 

        <!-- Visi -->
        <div class="row">
          <div class="col-12">
            <div class="card">
              <form action="">
              <!-- Header Table -->
              <div class="card-header">
                <h4>Visi</h4>              
              </div>
              <div class="card-body">
                <!-- Text Area -->
                <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Isi Visi Yayasan Al-Mu'awanah</label>
                  <div class="col-sm-12 col-md-7">
                    <textarea id="visi" class="summernote-simple" disabled></textarea>
                  </div>
                </div>                                       
              </div>
              <!-- Buttons -->
              <div class="card-footer text-right">
                <div class="buttons">
                    <button class="cancel btn btn-danger collapse" data-toggle="collapse" data-target=".multi-collapse" ><i class="fas fa-times"></i> Cancel</button>
                    <button class="save btn btn-success collapse"><i class="far fa-save"></i> Simpan</button>
                    <button class="edit btn btn-warning collapse show" data-toggle="collapse" data-target=".multi-collapse" ><i class="fas fa-edit"></i> Edit</button>
                </div>
              </div>
            </form>
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
              <form action="">
              <div class="card-body">
                <!-- Text Area -->
                <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Isi Misi Yayasan Al-Mu'awanah</label>
                  <div class="col-sm-12 col-md-7">
                    <textarea id="misi" class="summernote-simple"></textarea>
                  </div>
                </div>                                       
              </div>
              <!-- Buttons -->
              <div class="card-footer text-right">
                <div class="buttons">
                    <button class="cancel btn btn-danger collapse" data-toggle="collapse" data-target=".multi-collapse" ><i class="fas fa-times"></i> Cancel</button>
                    <button class="save btn btn-success collapse"><i class="far fa-save"></i> Simpan</button>
                    <button class="edit btn btn-warning collapse show" data-toggle="collapse" data-target=".multi-collapse" ><i class="fas fa-edit"></i> Edit</button>
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
  <script src="{{ asset('adminAssets/modules/summernote/summernote.min.js') }}"></script>
@endsection

@section('scriptline')
<script>
  $('#tentang').summernote('code','{!! $tentang->content !!}');
  $('#visi').summernote('code','{!! $visi->content !!}'  );
  $('#misi').summernote('code','{!! $misi->content !!}'  );
  $('#tentang').summernote('disable');
  $('#visi').summernote('disable');
  $('#misi').summernote('disable');

  $(document).on("click", ".edit", function(e) {
    e.preventDefault();
    var form = $(this).parent().parent().parent();
    form.find('.summernote-simple').summernote('enable');
    form.find('.save').collapse('show');
    form.find('.cancel').collapse('show');
    form.find('.edit').collapse('hide');
  });

  $(document).on("click", ".cancel", function(e) {
    e.preventDefault();
    var form = $(this).parent().parent().parent();
    form.find('.summernote-simple').summernote('disable');
    form.find('.save').collapse('hide');
    form.find('.cancel').collapse('hide');
    form.find('.edit').collapse('show');
  });
</script>
@endsection