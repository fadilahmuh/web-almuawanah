<div class="modal-dialog modal-lg" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Edit Kontak</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  <form action="{{ route('editkontak', [$kontak->id]) }}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <input type="hidden" name="divisi" value="{{session('divisi')}}">
      <input type="hidden" name="bagian" value="kontak">
    <!-- Judul -->
    <div class="modal-body">
      <div class="form-group">
        <label>Jenis Kontak</label>
        <select name="judul" class="form-control">
          <option value="">Pilih Satu</option>
          <option value="Telepon" @if($kontak->judul == 'Telepon') selected @endif>Telepon</option>
          <option value="Whatsapp" @if($kontak->judul == 'Whatsapp') selected @endif>Whatsapp</option>
          <option value="Email" @if($kontak->judul == 'Email') selected @endif>Email</option>
          <option value="Alamat" @if($kontak->judul == 'Alamat') selected @endif>Alamat</option>
        </select>
      </div>
      <div class="form-group">
        <label>Keterangan</label>
        <input name="desc1" type="text" class="form-control" placeholder="(Opsional)" value="{{ $kontak->desc1 }}">
      </div>
      <!-- Deskripsi -->
      <div class="form-group">
        <label>Isi Kontak</label>
        <input name="content" type="text" class="form-control" value="{{ $kontak->content}}">
      </div>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
      <button type="submit" class="btn btn-success">Simpan</button>
    </div>
  </form>
  </div>
</div>