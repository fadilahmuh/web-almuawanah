@extends('admin.appadmin')

@section('csslib')
  <!-- CSS Libraries -->  
  <link rel="stylesheet" href="{{ asset('assets/modules/dropify/dist/css/dropify.css') }}">

<style>
    .dropify-wrapper {
      width: 50%;
    }
  </style>
@endsection

@section('maincontent')    
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Brosur Website Al-Mu'awanah</h1>
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
      <div class="row mt-4">
        @foreach ($brosur as $key=>$br)
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Brosur {{++$key}}</h4>              
            </div>
            <div class="card-body">
              <form action="{{ route('editbrosur', [$br->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" name="divisi" value="{{session('divisi')}}">
                <input type="hidden" name="bagian" value="{{$br->bagian}}">
                
                <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Title</label>
                  <div class="col-sm-12 col-md-7">
                    <input type="text" name="judul" class="form-control" disabled value="{{$br->judul}}">
                  </div>
                </div>

                <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Content</label>
                  <div class="col-sm-12 col-md-7">
                    <textarea class="form-control" name="content" rows="3"disabled>{{$br->content}}</textarea>
                  </div>
                </div>

                <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Cover</label>
                  <div class="col-sm-12 col-md-7">
                      <input type="file" name="attachment" class="dropify" data-show-remove="false" data-allowed-formats="portrait" data-height="300" disabled="disabled" data-default-file="{{asset('uploads/component/'.Str::replace(' ', '%20', $br->attachment))}}"/>                      
                  </div>
                </div>

                <div class="card-footer text-right">
                  <div class="buttons">
                    <button class="cancel btn btn-danger collapse"><i class="fas fa-times"></i> Cancel</button>
                    <button class="save btn btn-success collapse"><i class="far fa-save"></i> Simpan</button>
                    <button class="edit btn btn-warning collapse show"><i class="fas fa-edit"></i> Edit</button>
              </form>   
                  <form action="{{ route('delbrosur', [$br->id]) }}" method="POST" style="display: inline-block;">
                    @csrf
                    @method('delete')
                    <button class="del btn btn-danger collapse show"><i class="fas fa-trash"></i> Hapus</button>
                  </form>                 
                  </div>
                </div>
            </div>
          </div>
        </div>
        @endforeach

        <div class="col-12 multi-collapse collapse">
          <div class="card">
            <div class="card-header">
              <h4>Tambah Brosur</h4>
              <div class="card-header-action">
                <button class="btn btn-icon btn-danger" data-toggle="collapse" data-target=".multi-collapse" aria-expanded="false" aria-controls="newbanner"><i class="fas fa-times"></i></button>
              </div>
            </div>
            <div class="card-body">
              <form action="{{ route('newbrosur') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <input type="hidden" name="divisi" value="{{session('divisi')}}">
                <input type="hidden" name="bagian" value="brosur">
                
                <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Title</label>
                  <div class="col-sm-12 col-md-7">
                    <input type="text" name="judul" class="form-control">
                  </div>
                </div>

                <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Content</label>
                  <div class="col-sm-12 col-md-7">
                    <textarea class="form-control" name="content" rows="3"></textarea>
                  </div>
                </div>

                <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Cover</label>
                  <div class="col-sm-12 col-md-7">
                      <input type="file" name="attachment" class="dropify" data-show-remove="false" data-height="300" data-allowed-formats="portrait"/>
                      <ul>
                        <p class="mb-0">Rekomendasi:</p>
                        <li>Gambar .png atau .jpg</li>
                        <li>Orientasi gambar potrait (1920x1080)</li>
                      </ul>  
                  </div>
                </div>

                <div class="card-footer text-right">
                  <div class="buttons">                  
                    <button class="btn btn-success"><i class="far fa-save"></i> Simpan Brosur</button>
                  </div>
                </div>
              </form>
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
@endsection   

@section('scriptlib')
  <!-- JS Libraies -->  
  <script src="{{ asset('assets/modules/sweetalert/sweetalert.min.js') }}"></script>
  <script src="{{ asset('assets/modules/dropify/dist/js/dropify.js') }}"></script>
@endsection
  
@section('scriptpage')
  <script src="{{ asset('assets/js/views/brosur.js') }}"></script>
@endsection