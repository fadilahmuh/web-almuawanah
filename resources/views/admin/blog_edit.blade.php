@extends('admin.appadmin')

@section('csslib')
  <!-- CSS Libraries -->  
  <link rel="stylesheet" href="{{ asset('assets/modules/summernote/summernote.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/modules/jquery-selectric/selectric.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/modules/select2/dist/css/select2.min.css') }}">
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
        <h1>Edit Postingan</h1>
    </div>
    <div class="section-body">
      <!-- Content -->
      <div class="row mt-4">
        <div class="col-12">
          <div class="card">
            <div class="card-body">              
              <form action="{{ route('blog.update', [$post->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
              <div class="form-group">
                <label>Judul</label>
                <input type="text" name="judul" class="form-control" value="{{old('judul')}}{{$post->judul}}">
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
                  <div id="image-preview" class="image-preview" style="background-image: url({{asset('uploads/posts/'.Str::replace(' ', '%20', $post->thumbnail))}});background-size: cover; background-position: center center; ">
                    <label for="image-upload" id="image-label">Choose File</label>
                    <input type="file" name="thumbnail" id="image-upload" />
                  </div>
                </div>
              </div>
              <!-- Tags -->
              <div class="form-group">
                <label>Tags</label>
                <select class="form-control select2" multiple="" name="tag[]">
                  @if(old('tag'))
                    @foreach($tags as $tag)
                      <option value="{{ $tag->nama }}" @foreach (old('tag') as $ot) @if($ot == $tag->nama) selected @endif @endforeach >{{ $tag->nama }}</option> 
                    @endforeach               
                  @else
                    @foreach($tags as $tag)
                      <option value="{{ $tag->nama }}" @foreach ($post->tag as $pt ) @if($pt == $tag->nama) selected @endif @endforeach >{{ $tag->nama }}</option> 
                    @endforeach
                  @endif
                </select>
              </div>             

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
  {{-- <script src="{{ asset('assets/modules/summernote/summernote.min.js') }}"></script> --}}
  <script src="{{ asset('assets/modules/summernote/summernote.js') }}"></script>
  <script src="{{ asset('assets/modules/jquery-selectric/jquery.selectric.min.js') }}"></script>
  <script src="{{ asset('assets/modules/select2/dist/js/select2.full.min.js') }}"></script>
  <script src="{{ asset('assets/modules/upload-preview/assets/js/jquery.uploadPreview.min.js') }}"></script>
@endsection

@section('scriptpage')
  <!-- Page Specific JS File -->
<script src="{{ asset('assets/js/page/features-post-create.js') }}"></script>
@endsection

@section('scriptline')
<script>
  $('.summernote').summernote('code',`{!! $post->content !!}`);
  $('#select_tag').prop('selectedIndex', {{ $post->is_published }}).selectric('refresh');   

  @if(old('content') != null)
  $('.summernote').summernote('code','{!!old('content')!!}'  );              
  @endif
  @if(old('is_published') != null)
  $('#select_tag').prop('selectedIndex', {{old('is_published')}}).selectric('refresh');                
  @endif
</script>
@endsection
