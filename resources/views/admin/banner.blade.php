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
          <h1>Banner Al-Mu'awanah</h1>
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
        <h2 class="section-title">Halaman Awal</h2>
        <div class="row">     
          @foreach ($banners as $key=>$banner)
          <div class="col-12">
            <div class="card">
              <!-- Header Table -->
              <div class="card-header">
                <h4>Banner {{++$key}}</h4>                
              </div>
              <div class="card-body">
                <form action="{{ route('editbanner', [$banner->id]) }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  @method('PUT')
                  <input type="hidden" name="divisi" value="{{session('divisi')}}">
                  <input type="hidden" name="bagian" value="banner">
                <!-- Banner Form -->
                <!-- Title -->
                <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Title</label>
                  <div class="col-sm-12 col-md-7">
                    <input type="text" name="judul" class="form-control" disabled value="{{$banner->judul}}">
                  </div>
                </div>
                <!-- Text Area -->
                <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Content</label>
                  <div class="col-sm-12 col-md-7">
                    <textarea class="form-control" name="content" rows="3" disabled>{{$banner->content}}</textarea>
                  </div>
                </div>
                <!-- Thumbnail -->
                <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Cover</label>
                  <div class="col-sm-12 col-md-7">
                      <input type="file" name="attachment" class="dropify" data-show-remove="false" data-height="300" disabled="disabled" data-default-file="{{asset('uploads/component/'.Str::replace(' ', '%20', $banner->attachment))}}"/>
                  </div>
                </div>
              </div>
              <!-- Buttons -->
              <div class="card-footer text-right">
                <div class="buttons">
                  <button class="cancel btn btn-icon btn-danger collapse"><i class="fas fa-times"></i> Cancel</button>
                  <button class="save btn btn-icon btn-success collapse"><i class="far fa-save"></i> Simpan</button>
                  <button class="edit btn btn-icon btn-warning collapse show"><i class="fas fa-edit"></i> Edit</button>
                </form>   
                <form action="{{ route('delbanner', [$banner->id]) }}" method="POST" style="display: inline-block;">
                  @csrf
                  @method('delete')
                  <button class="del btn btn-icon btn-danger collapse show"><i class="fas fa-trash"></i> Hapus</button>
                </form>                 
                </div>
              </div>
            </div>
          </div>  
          @endforeach

          <div class="col-12 collapse multi-collapse">
            <div class="card">
              <!-- Header Table -->
              <div class="card-header">
                <h4>Tambah Banner</h4>
                <div class="card-header-action">
                  <button class="btn btn-icon btn-danger" data-toggle="collapse" data-target=".multi-collapse" aria-expanded="false" aria-controls="newbanner"><i class="fas fa-times"></i></button>
                </div>
              </div>
              <div class="card-body">
                <form action="{{ route('newbanner') }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  @method('POST')
                  <input type="hidden" name="divisi" value="{{session('divisi')}}">
                  <input type="hidden" name="bagian" value="banner">
                <!-- Banner Form -->
                <!-- Title -->
                <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Title</label>
                  <div class="col-sm-12 col-md-7">
                    <input type="text" name="judul" class="form-control">
                  </div>
                </div>
                <!-- Text Area -->
                <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Content</label>
                  <div class="col-sm-12 col-md-7">
                    <textarea class="form-control" name="content" id="exampleFormControlTextarea1" rows="3"></textarea>
                  </div>
                </div>
                <!-- Thumbnail -->
                <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Cover</label>
                  <div class="col-sm-12 col-md-7">
                      <input type="file" name="attachment" class="dropify" data-show-remove="false" data-height="300"  />
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
                  <button class="btn btn-success">Simpan Banner</button>
                </div>
              </div>
              </form>                    
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
    var form = $(this).parent().parent().parent().find('form');
    form.find('input[name=judul]').removeAttr('disabled');
    form.find('textarea[name=content]').removeAttr('disabled');
    form.find('input[name=attachment]').removeAttr('disabled');
    form.find('.dropify-wrapper').removeClass('disabled');
    $(this).parent().find('.save').collapse('show');
    $(this).parent().find('.cancel').collapse('show');
    $(this).parent().find('.edit').collapse('hide');
    $(this).parent().find('.del').collapse('hide');
  });

  $(document).on("click", ".cancel", function(e) {
    e.preventDefault();
    var form = $(this).parent().parent().parent().find('form');
    form.find('input[name=judul]').prop('disabled', true);
    form.find('textarea[name=content]').prop('disabled', true);
    form.find('input[name=attachment]').prop('disabled', true);
    form.find('.dropify-wrapper').addClass('disabled');
    $(this).parent().find('.save').collapse('hide');
    $(this).parent().find('.cancel').collapse('hide');
    $(this).parent().find('.edit').collapse('show');
    $(this).parent().find('.del').collapse('show');
  });

  $('.del').click(function(event) {
      var form =  $(this).closest("form");
      event.preventDefault();
      swal({
          title: `Hapus banner ?`,
          text: "Jika banner ini dihapus maka tidak dapat dikembalikan lagi.",
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