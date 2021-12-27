<link rel="stylesheet" href="{{ asset('assets/modules/dropify/dist/css/dropify.css') }}">

<div class="modal-dialog modal-lg" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Edit Foto Galeri</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <form action="{{ route('editgaleri', [$foto->id]) }}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <input type="hidden" name="divisi" value="{{session('divisi')}}">
      <input type="hidden" name="bagian" value="galeri">
    <!-- Judul -->
    <div class="modal-body">
      <div class="form-group">
        <label>Judul</label>
        <input name="judul" type="text" class="form-control" placeholder="(Opsional)" value="{{$foto->judul}}">
      </div>
      <!-- Deskripsi -->
      <div class="form-group">
        <label>Deskripsi</label>
        <textarea name="content" class="form-control" name="content" rows="3" placeholder="(Opsional)">{{$foto->caption}}</textarea>
      </div>
      <!-- Gambar -->
      <div class="form-group">
        <label>Foto/Gambar</label>
        <div class="col-sm-12 col-md-auto">
            <input type="file" name="attachment" class="dropify" data-show-remove="false" data-height="300" data-default-file="{{asset('uploads/galeri/'.Str::replace(' ', '%20', $foto->attachment))}}"/>
        </div>
      </div>              
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
      <button type="submit" class="btn btn-success">Simpan</button>
    </div>
  </form>
  </div>
</div>
</div>

<script src="{{ asset('assets/modules/dropify/dist/js/dropify.js') }}"></script>
<script>
   $('.dropify').dropify({
    messages: {
        'default': 'Tarik dan lepaskan file atau klik disini',
        'replace': 'Tarik dan lepaskan file atau klik disini untuk mengganti',
        'remove':  'Remove',
        'error':   'Ooops, kesalahan terjadi.'
    }
  }); 
</script>