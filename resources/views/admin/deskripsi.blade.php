@extends('admin.appadmin')

@section('csslib')
  <!-- CSS Libraries -->  
  <link rel="stylesheet" href="{{ asset('adminAssets/modules/dropify/dist/css/dropify.css') }}">
  <link rel="stylesheet" href="{{ asset('adminAssets/modules/summernote/summernote.min.css') }}">
@endsection

@section('maincontent')
<!-- Main Content -->
<div class="main-content">
    <section class="section">
      <div class="section-header">
          <h1>Deskripsi Singkat Al-Mu'awanah</h1>
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
        <h2 class="section-title">Deskripsi</h2>
        <!-- Content -->
        <div class="row">
          <div class="col-12">
            <div class="card">
              <form action="{{ route('editdesc', [$deskripsi->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" name="divisi" value="{{session('divisi')}}">
                <input type="hidden" name="bagian" value="deskripsi-singkat">
              <div class="card-body">                
                <!-- Isi Sambutan -->
                <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                    Isi Deskripsi Singkat
                  </label>
                  <div class="col-sm-12 col-md-7">
                    <textarea class="summernote-simple" name="content" id="desc" rows="5" disabled>{{$deskripsi->content}}</textarea>
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
  <script src="{{ asset('adminAssets/modules/summernote/summernote.min.js') }}"></script>
  <script src="{{ asset('adminAssets/js/views/deskripsi.js') }}"></script>
@endsection

@section('scriptline')
<script>
  
</script>
@endsection