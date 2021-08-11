@extends('admin.appadmin')

@section('csslib')
  <!-- CSS Libraries -->  
  <link rel="stylesheet" href="{{ asset('adminAssets/modules/summernote/summernote.min.css') }}">
  <link rel="stylesheet" href="{{ asset('adminAssets/modules/jquery-selectric/selectric.css') }}">
@endsection

@section('maincontent')    
<div class="main-content">
  <section class="section">
    @if($errors->any())
    @foreach($errors->getMessages() as $this_error)
    <div class="alert alert-danger" role="alert">
      <i class="fas fa-exclamation-triangle  mr-3"></i> {{$this_error[0]}}
    </div> 
    @endforeach
    @endif 
    <div class="section-header">
        <h1>Buat Postingan Baru</h1>
    </div>
    <div class="section-body">
      <!-- Content -->
      <div class="row mt-4">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <form action="{{ route('blog.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
              <div class="form-group">
                <label>Judul</label>
                <input type="text" name="judul" class="form-control" value="{{old('judul')}}">
              </div>
              <!-- Isi Blog -->
              <div class="form-group">
                <label>Isi</label>
                <textarea name="content" class="summernote"></textarea>
              </div>                        
              <!-- Gambar -->
              <div class="form-group">
                <label>Gambar Cover</label>
                <div class="col-sm-12 col-md-auto">
                  <div id="image-preview" class="image-preview">
                    <label for="image-upload" id="image-label">Choose File</label>
                    <input type="file" name="thumbnail" id="image-upload" />
                  </div>
                </div>
              </div>
              <!-- Tags -->
              <div class="form-group">
                <label>Tags</label>
                <input type="text" name="tag" class="form-control inputtags" value="{{old('tag')}}">
              </div>
              <!-- Status Blog -->
              <div class="form-group">
                <label>Status</label>
                <select name="is_published" class="form-control selectric" id="select_tag">
                  <option value="0">Draft</option>
                  <option value="1">Published</option>
                </select>
              </div>
              <div class="text-right">
                <div>
                  <button type="" class="btn btn-success">Simpan</button>                        
                </div>
              </div>
            </form>

            </div>
          </div>
        </div>
      </div>          
    </div>
    
  </section>
</div>
@endsection       
      

@section('scriptlib')
  <!-- JS Libraies -->  
  <script src="{{ asset('adminAssets/modules/summernote/summernote.min.js') }}"></script>
  <script src="{{ asset('adminAssets/modules/jquery-selectric/jquery.selectric.min.js') }}"></script>
@endsection

@section('scriptpage')
  <!-- Page Specific JS File -->
<script src="{{ asset('adminAssets/js/page/features-post-create.js') }}"></script>
@endsection

@section('scriptline')
<script>
  @if(old('content') != null)
  $('.summernote').summernote('code','{!!old('content')!!}' );              
  @endif
  @if(old('is_published') != null)
  $('#select_tag').prop('selectedIndex', {{old('is_published')}}).selectric('refresh');                
  @endif
</script>
@endsection
