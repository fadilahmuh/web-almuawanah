<div class="modal-dialog modal-lg" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Tambah Admin</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <form action="{{ route('userdata.update', [$user->id]) }}" method="POST" enctype="multipart/form-data">
    <div class="modal-body">
        @csrf
        @method('PUT')
        <div class="form-group">
          <label>Nama Lengkap</label>
          <input type="text" name="name" class="form-control" value="{{$user->name}}">          
        </div>
        <div class="form-group">
          <label>Email</label>
          <input type="text" name="email" class="form-control" value="{{$user->email}}">
        </div>
        <div class="form-group">
        <label>Role</label>        
        <select name="role" class="form-control">
          <option value="admin_yys" @foreach($user->roles as $p) @if($p->name == 'admin_yys') selected @endif @endforeach>Admin Yayasan</option>
          <option value="admin_tka" @foreach($user->roles as $p) @if($p->name == 'admin_tka') selected @endif @endforeach>Admin TKA/TPA</option>
          <option value="admin_ra" @foreach($user->roles as $p) @if($p->name == 'admin_ra') selected @endif @endforeach>Admin Ra</option>
          <option value="admin_mts" @foreach($user->roles as $p) @if($p->name == 'admin_mts') selected @endif @endforeach>Admin MTs</option>
          <option value="admin_ma" @foreach($user->roles as $p) @if($p->name == 'admin_ma') selected @endif @endforeach>Admin MA</option>
          <option value="admin_pst" @foreach($user->roles as $p) @if($p->name == 'admin_pst') selected @endif @endforeach>Admin Pondok Pesantren</option>
        </select>
      </div>
      <div class="form-group">
        <label>Nomor Hp</label>
        <div class="input-group">
          <div class="input-group-prepend">
            <div class="input-group-text">
              <i class="fas fa-phone"></i>
            </div>
          </div>
          <input type="text" name="no_hp" class="form-control phone-number" value="{{$user->no_hp}}">
        </div>
      </div>
      <div class="card-header-action mb-2 collapse multi-collapse show">
        <a class="btn btn-primary " data-toggle="collapse" href="" data-target=".multi-collapse" role="button" aria-expanded="false" aria-controls="collapseExample">
          Ganti Password
        </a>
      </div>
      <div class="text-right card-header-action mb-2 collapse multi-collapse">
        <a class="btn btn-danger" data-toggle="collapse" href="" data-target=".multi-collapse" role="button" aria-expanded="false" aria-controls="collapseExample">
          Cancel
        </a>
      </div>
      <div class="collapse multi-collapse" aria-controls="collapseExample">       
        <div class="form-group">
          <label>Password</label>
          <div class="input-group">
            <div class="input-group-prepend">
              <div class="input-group-text">
                <i class="fas fa-lock"></i>
              </div>
            </div>
            <input type="password" name="password" class="form-control pwstrength" data-indicator="pwindicator" >
          </div>
        </div>
        <div class="form-group">
          <label>Confirm Password</label>
          <div class="input-group">
            <div class="input-group-prepend">
              <div class="input-group-text">
                <i class="fas fa-lock"></i>
              </div>
            </div>
            <input type="password" name="password_confirmation" class="form-control pwstrength" data-indicator="pwindicator">
          </div>
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
