
<div class="modal-dialog modal-lg" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Edit File</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <form action="{{ route('editfile', [$file->id]) }}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <input type="hidden" name="divisi" value="{{session('divisi')}}">
          
    <div class="modal-body">
      <div class="form-group">
        <label>Nama File</label>
        <input name="nama" type="text" class="form-control" value="{{$file->nama}}">
      </div>   

      <div class="form-group">
        <label>File</label>
        <div class="col-sm-12 col-md-auto">
            <input type="file" name="attachment" class="dropify" data-show-remove="false" data-height="300" data-default-file="{{asset('uploads/file/'.Str::replace(' ', '%20', $file->file))}}"/>
        </div>
      </div>
      
      <div class="form-group">
        <label>Status</label>
        <select name="is_published" class="form-control selectric" id="select_tag2">
          <option value="0">Draft</option>
          <option value="1">Published</option>
        </select>
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
<script src="{{ asset('assets/modules/jquery-selectric/jquery.selectric.min.js') }}"></script>
<script src="{{ asset('assets/modules/select2/dist/js/select2.full.min.js') }}"></script>

<script>
  $(".dropify").dropify({
    messages: {
        default: "Tarik dan lepaskan file atau klik disini",
        replace: "Tarik dan lepaskan file atau klik disini untuk mengganti",
        remove: "Remove",
        error: "Ooops, kesalahan terjadi.",
    },
});
  
  $("#select_tag2").selectric({
      disableOnMobile: false,
      nativeOnMobile: false
    });
  $('#select_tag2').prop('selectedIndex', {{ $file->is_published }}).selectric('refresh');  
</script>