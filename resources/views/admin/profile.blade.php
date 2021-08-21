@extends('admin.appadmin')

@section('csslib')
  <!-- CSS Libraries -->  
  <link rel="stylesheet" href="{{ asset('assets/modules/summernote/summernote.min.css') }}">
@endsection

@section('maincontent')
<!-- Main Content -->
<div class="main-content">
    <section class="section">
      <div class="section-header">
          <h1>Profil Website Al-Mu'awanah</h1>
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
        <h2 class="section-title">Data Profil</h2>

        <!-- Tentang Kami -->
        <div class="row">
          <div class="col-12">
            <div class="card">
              <form action="{{ route('edittentang', [$tentang->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" name="divisi" value="{{session('divisi')}}">
                <input type="hidden" name="bagian" value="tentang">
              <!-- Header Table -->
              <div class="card-header">
                <h4>Tentang Kami</h4>              
              </div>
              <div class="card-body">  
                <!-- Text Area -->
                <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Isi Tentang Yayasan Al-Mu'awanah</label>
                  <div class="col-sm-12 col-md-7">
                    <textarea id="tentang" name="content" class="summernote-simple"></textarea>
                  </div>
                </div>                                  
              </div>
              <!-- Buttons -->
              <div class="card-footer text-right">
                <div class="buttons">
                    <button class="cancel btn btn-danger collapse" data-toggle="collapse" data-target=".multi-collapse" ><i class="fas fa-times"></i> Cancel</button>
                    <button class="save btn btn-success collapse" data-bagian="Tentang Kami"><i class="far fa-save"></i> Simpan</button>
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
              <form action="{{ route('editvisi', [$visi->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" name="divisi" value="{{session('divisi')}}">
                <input type="hidden" name="bagian" value="visi">
              <!-- Header Table -->
              <div class="card-header">
                <h4>Visi</h4>              
              </div>
              <div class="card-body">
                <!-- Text Area -->
                <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Isi Visi Yayasan Al-Mu'awanah</label>
                  <div class="col-sm-12 col-md-7">
                    <textarea id="visi" name="content" class="summernote-simple"></textarea>
                  </div>
                </div>                                       
              </div>
              <!-- Buttons -->
              <div class="card-footer text-right">
                <div class="buttons">
                    <button class="cancel btn btn-danger collapse" data-toggle="collapse" data-target=".multi-collapse" ><i class="fas fa-times"></i> Cancel</button>
                    <button class="save btn btn-success collapse" data-bagian="Visi"><i class="far fa-save"></i> Simpan</button>
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
              <form action="{{ route('editmisi', [$misi->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" name="divisi" value="{{session('divisi')}}">
                <input type="hidden" name="bagian" value="misi">
              <div class="card-body">
                <!-- Text Area -->
                <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Isi Misi Yayasan Al-Mu'awanah</label>
                  <div class="col-sm-12 col-md-7">
                    <textarea id="misi" name="content" class="summernote-simple"></textarea>
                  </div>
                </div>                                       
              </div>
              <!-- Buttons -->
              <div class="card-footer text-right">
                <div class="buttons">
                    <button class="cancel btn btn-danger collapse" data-toggle="collapse" data-target=".multi-collapse" ><i class="fas fa-times"></i> Cancel</button>
                    <button class="save btn btn-success collapse" data-bagian="Misi"><i class="far fa-save"></i> Simpan</button>
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
  <script src="{{ asset('assets/modules/summernote/summernote.min.js') }}"></script>
  <script src="{{ asset('assets/modules/sweetalert/sweetalert.min.js') }}"></script>
@endsection
  
@section('scriptpage')
  <script src="{{ asset('assets/js/views/profile.js') }}"></script>
@endsection

@section('scriptline')
<script>
  $('#tentang').summernote('code','{!! $tentang->content !!}');
  $('#visi').summernote('code','{!! $visi->content !!}'  );
  $('#misi').summernote('code','{!! $misi->content !!}'  );
  $('#tentang').summernote('disable');
  $('#visi').summernote('disable');
  $('#misi').summernote('disable');  
</script>
@endsection