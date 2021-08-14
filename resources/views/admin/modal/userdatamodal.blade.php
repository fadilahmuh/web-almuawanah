@section('modalscontent')
 <!-- Create Modal User -->
 <div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Admin</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        @foreach($errors->getMessages() as $this_error)
        <div class="alert alert-danger" role="alert">
          <i class="fas fa-exclamation-triangle  mr-3"></i> {{$this_error[0]}}
        </div> 
        @endforeach
        <br>
        <form action="{{ route('userdata.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <label>Nama Lengkap</label>
          <input type="text" name="name" class="form-control" value="{{old('name')}}">          
        </div>
        <div class="form-group">
          <label>Email</label>
          <input type="text" name="email" class="form-control" value="{{old('email')}}">
        </div>
        <div class="form-group">
          <label>Password</label>
          <div class="input-group">
            <div class="input-group-prepend">
              <div class="input-group-text">
                <i class="fas fa-lock"></i>
              </div>
            </div>
            <input type="password" name="password" class="form-control pwstrength" data-indicator="pwindicator">
          </div>
          <div id="pwindicator" class="pwindicator">
            <div class="bar"></div>
            <div class="label"></div>
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
          <div id="pwindicator" class="pwindicator">
            <div class="bar"></div>
            <div class="label"></div>
          </div>
        </div>
        <div class="form-group">
          <label>Role</label>
          <select name="role" class="form-control selectric">
            <option value="superadmin">Superadmin</option>
            <option value="admin_yys">Admin Yayasan</option>
            <option value="admin_tka">Admin TKA/TPA</option>
            <option value="admin_ra">Admin Ra</option>
            <option value="admin_mts">Admin MTs</option>
            <option value="admin_ma">Admin MA</option>
            <option value="admin_pst">Admin Pondok Pesantren</option>
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
            <input type="text" name="no_hp" class="form-control phone-number" value="{{old('no_hp')}}">
          </div>
        </div>      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
        <button type="" class="btn btn-success">Simpan</button>
      </div>
    </form>
    </div>
  </div>
</div>
<!-- End Create Modal User -->

<!-- Edit Modal User -->
<div class="modal fade" id="editUserModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Admin</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          @foreach($errors->getMessages() as $this_error)
          <div class="alert alert-danger" role="alert">
            <i class="fas fa-exclamation-triangle  mr-3"></i> {{$this_error[0]}}
          </div> 
          @endforeach
          <br>
          <form action="" method="POST" enctype="multipart/form-data" id="editFormModal">
            @csrf
            @method('PUT')
          <div class="form-group">
            <label>Nama Lengkap</label>
            <input type="text" name="name" id="fname" class="form-control" value="">          
          </div>
          <div class="form-group">
            <label>Email</label>
            <input type="text" name="email" id="emailAdmin" class="form-control" value="{{old('email')}}">
          </div>
          <div class="form-group">
            <label>Password</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <div class="input-group-text">
                  <i class="fas fa-lock"></i>
                </div>
              </div>
              <input type="password" name="password" class="form-control pwstrength" data-indicator="pwindicator">
            </div>
            <div id="pwindicator" class="pwindicator">
              <div class="bar"></div>
              <div class="label"></div>
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
            <div id="pwindicator" class="pwindicator">
              <div class="bar"></div>
              <div class="label"></div>
            </div>
          </div>
          <div class="form-group">
            <label>Role</label>
            <select name="role" class="form-control selectric" id="selectRoleAdmin">
              <option value="superadmin">Superadmin</option>
              <option value="admin_yys">Admin Yayasan</option>
              <option value="admin_tka">Admin TKA/TPA</option>
              <option value="admin_ra">Admin Ra</option>
              <option value="admin_mts">Admin MTs</option>
              <option value="admin_ma">Admin MA</option>
              <option value="admin_pst">Admin Pondok Pesantren</option>
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
              <input type="text" name="no_hp" class="form-control phone-number" value="{{old('no_hp')}}" id="no_hpAdmin">
            </div>
          </div>      
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
          <button type="" class="btn btn-warning">Ubah</button>
        </div>
      </form>
      </div>
    </div>
  </div>
  <!-- End Edit Modal User -->
  @endsection