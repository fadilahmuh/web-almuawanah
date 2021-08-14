@extends('admin.appadmin')
@section('csslib')
<link rel="stylesheet" href="{{ asset('adminAssets/modules/datatables/datatables.min.css') }}">
<link rel="stylesheet" href="{{ asset('adminAssets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('adminAssets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('adminAssets/modules/jquery-selectric/selectric.css') }}">
@endsection

@include('admin.modal.userdatamodal')

@section('maincontent')
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
        <h1>Daftar Admin Web Al-Mu'awanah</h1>
    </div>    
    <div class="section-body">
      <h2 class="section-title">Tabel Data</h2>  
      @if(Session::has('success'))
      <div class="alert alert-success" role="alert">
        <i class="fas fa-check mr-3"></i> {{ Session('success') }} 
      </div>        
      @endif 
      @if ($errors->any())
      <div class="alert alert-danger" role="alert">
        <i class="fas fa-exclamation-triangle  mr-3"></i> Gagal mengubah data!!
      </div> 
      @endif   
      <div class="row">
        <div class="col-12">
          <div class="card">
            <!-- Header Table -->
            <!-- <div class="card-header">
              <h4>Tabel Admin</h4>              
            </div> -->
            <div class="card-body">
              <!-- Tambah Button -->
              <div class="text-right">
                <div>
                  <a href="#" class="btn btn-icon icon-right btn-success" data-toggle="modal" data-target="#userModal">
                    <i class="fas fa-plus"></i> 
                    Tambah Admin
                  </a>                        
                </div>
                
              </div>
              <br>
              <!-- Admin Table -->
              <div class="table-responsive">
                <table id="datatable" class="table table-striped" id="table-1">
                  <thead  class="text-center">
                    <tr>
                      <th>
                        id
                      </th>
                      <th>Nama Lengkap</th>
                      <th>E-Mail</th>
                      <th>No Handphone</th>
                      <th>Role</th>
                      <th>Action    </th>
                    </tr>
                  </thead>
                  <tbody class="text-center">
                    @foreach($nonmembers as $u)
                    <tr>
                      <td class="align-middle">{{ $u->id }}</td>
                      <td class="text-left align-middle">{{ $u->name }}</td>
                      <td class="align-middle">{{ $u->email }}</td>
                      <td class="align-middle">{{ $u->no_hp }}</td>
                      <td class="align-middle"><div class="badge badge-success roleAdmin">@foreach($u->roles as $p) {{ $p->name }}@endforeach</div></td>
                      <td>
                        <div class="btn-toolbar justify-content-center" role="group">
                          <a href="" data-attr="" class="btn btn-icon btn-warning editModal" data-toggle="modal" data-target="#editUserModal"><i class="fas fa-edit"></i></a>
                          <form action="{{ route('userdata.destroy', [$u->id]) }}" method="POST">                              
                            @csrf
                            @method('delete')
                            <button class="del btn btn-icon btn-danger" data-name="{{ $u->name }}" data-toggle="tooltip" data-placement="top" title="" data-original-title="Hapus"><i class="fas fa-trash"></i></button>
                          </form>
                        </div>
                      </td>
                    </tr>  
                    @endforeach                  
                  </tbody>
                </table>
              </div>
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
<script src="{{ asset('adminAssets/modules/datatables/datatables.min.js') }}"></script>
<script src="{{ asset('adminAssets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('adminAssets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js') }}"></script>
<script src="{{ asset('adminAssets/modules/jquery-ui/jquery-ui.min.js') }}"></script>
<script src="{{ asset('adminAssets/modules/jquery-selectric/jquery.selectric.min.js') }}"></script>
<script src="{{ asset('adminAssets/modules/sweetalert/sweetalert.min.js') }}"></script>

@endsection

@section('scriptpage')
<!-- Page Specific JS File -->
<script src="{{ asset('adminAssets/js/page/modules-datatables.js') }}"></script>
{{-- <script type="text/javascript">
  @if (count($errors) > 0)
      $('#userModal').modal('show');
  @endif
</script> --}}
<script>
  $(document).ready(function () {
    var table = $('#datatable').DataTable();
    $index = 1;
    table.on('click', '.editModal', function(){

      $tr = $(this).closest('tr');
      if ($($tr).hasClass('child')) {
        $tr = $tr.prev('.parent');
      }

      var data = table.row($tr).data();
      console.log(data);

      $('#fname').val(data[1]);
      $('#emailAdmin').val(data[2]);
      $('#no_hpAdmin').val(data[3]);
      $('#editFormModal').attr('action', "/admin/userdata/"+data[0]);
      
      var elements = $(data[4]).text();
      console.log(elements);
      switch (elements) {
        case ' admin_yys':
          $index = 1;
          break;
        case ' admin_tka':
          $index = 2;
          break;
        case ' admin_ra':
          $index = 3;
          break;
        case ' admin_mts':
          $index = 4; 
          break;
          case ' admin_ma':
          $index = 5; 
          break;
          case ' admin_pst':
          $index = 6; 
          break;
        
        default:
          $index = 0;
          break;
      };
      $('select').prop('selectedIndex', $index).selectric('refresh');

    });
  });
</script>
<script>
  $('.del').click(function(event) {
    var form =  $(this).closest("form");
    var name = $(this).data("name");
    event.preventDefault();
    swal({
        title: `Hapus ${name}?`,
        text: "Jika Admin ini dihapus maka tidak dapat dikembalikan lagi.",
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