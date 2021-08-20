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
          <h1>Sambutan Al-Mu'awanah</h1>
      </div>
      @if($errors->any())
      @foreach($errors->getMessages() as $this_error)
      <div class="alert alert-danger" role="alert">
        <i class="fas fa-exclamation-triangle  mr-3"></i> {{$this_error[0]}}
      </div> 
      @endforeach
      @endif 
      @if(Session::has('success'))
      <div class="alert alert-success" role="alert">
        <i class="fas fa-check mr-3"></i> {{ Session('success') }} 
      </div>        
      @endif
      <div class="section-body">
        <h2 class="section-title">Ucapan Pembuka</h2>
        <!-- Content Form Editor -->
        <div class="row">
          <div class="col-12">
            <div class="card">
              <form action="{{ route('editsambutan', [$sambutan->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" name="divisi" value="{{session('divisi')}}">
                <input type="hidden" name="bagian" value="sambutan">
              <div class="card-body">
                <!-- Title -->
                <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Ucapan Pembuka</label>
                  <div class="col-sm-12 col-md-7">
                    <input type="text" name="judul" class="form-control" disabled value="{{ $sambutan->judul}}">
                  </div>
                </div>
                <!-- Text Area -->
                <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Isi Sambutan</label>
                  <div class="col-sm-12 col-md-7">
                    <textarea class="summernote-simple" name="content" id="sambutan" disabled></textarea>
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
                    <input type="text" name="nama" class="form-control" value="{{ $sambutan->desc1}}" disabled>
                  </div>
                </div>
                <!-- Deskripsi Nama di bawah foto -->
                <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Deskripsi Foto<div>
                    <label>(Optional)</label>
                  </div></label>
                  <div class="col-sm-12 col-md-7">
                    <input type="text" name="keterangan" class="form-control" value="{{ $sambutan->desc2}}" disabled>
                  </div>
                </div>
                <!-- Thumbnail -->
                <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Foto</label>
                  <div class="col-sm-12 col-md-auto">
                    <div id="image-preview" class="image-preview" style="background-image: url({{asset('uploads/component/'.Str::replace(' ', '%20', $sambutan->attachment))}});background-size: cover; background-position: center center;" >
                      <label for="image-upload" id="image-label">Choose File</label>
                      <input type="file" name="attachment" id="image-upload" disabled/>
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
  <script src="{{ asset('adminAssets/modules/summernote/summernote.min.js') }}"></script>
  <script src="{{ asset('adminAssets/modules/sweetalert/sweetalert.min.js') }}"></script>
@endsection

@section('scriptline')
<script>
  $('#sambutan').summernote('code','{!! $sambutan->content !!}');
  $('#sambutan').summernote('disable');

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
    $('#sambutan').summernote('enable');
  });

  $(document).on("click", ".cancel", function(e) {
    e.preventDefault();
    var inputs = $(this).parent().parent().parent().find(":input:not(:button)");
    console.log(inputs);
    inputs.prop('disabled', true);
    $('#sambutan').summernote('disable');
  });

  $('.save').click(function(event) {
      var form =  $(this).closest("form");
      event.preventDefault();
      swal({
          title: `Simpan hasil edit sambutan ?`,          
          icon: "warning",
          buttons: true,
          dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          form.submit();
        }
      });
  });
</script>
@endsection