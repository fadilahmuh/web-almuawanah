@extends('admin.appadmin')

@section('csslib')
<link rel="stylesheet" href="{{ asset('assets/modules/datatables/datatables.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/modules/dropify/dist/css/dropify.css') }}">
<link rel="stylesheet" href="{{ asset('assets/modules/jquery-selectric/selectric.css') }}">
<link rel="stylesheet" href="{{ asset('assets/modules/select2/dist/css/select2.min.css') }}">
@endsection

@section('maincontent')
<div class="main-content">
    <section class="section">
      <div class="section-header">
          <h1>Wakaf</h1>
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
        <div class="row">
          <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
              <div class="card-icon bg-primary">
                <i class="fas fa-money-bill"></i>
              </div>
              <div class="card-wrap">
                <div class="card-header">
                  <h4>Total Dana Masuk</h4>
                </div>
                <div class="card-body">
                  {{ $total }}
                </div>
              </div>
            </div>
          </div>                  
        </div>
        <h2 class="section-title">Data Wakaf</h2>
        <!-- Content -->
        <div class="row mt-4">
          <div class="col-12">
            <div class="card">
              <div class="card-body">               
                <div class="clearfix mb-3"></div>                
               
                <div class="table-responsive">
                  <table class="table table-striped" id="table-file">
                    <thead  class="text-center">
                      <tr>
                        <th>ID</th>
                        <th>Status</th>
                        <th>Nominal</th>
                        <th>Tanggal</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody class="text-center">
                      @foreach($data as $d)
                      <tr>
                        <td class="align-middle">{{ $d->id }}</td>
                        <td class="align-middle">
                          @if ($d->status == "settlement" )
                          <a href=""  class="badge badge-success text-white">Masuk</a>
                          @elseif ($d->status == "pending")
                          <a href="" class="badge badge-warning text-white">Pending</a>
                          @else
                          <a href="" class="badge badge-danger text-white">Dibatalkan</a>
                          @endif
                        </td>
                        <td class="align-middle">{{ $d->nominal }}</td>
                        <td class="align-middle">{{ $d->created_at }}</td>
                        <td class="text-center">
                          <a href="https://dashboard.sandbox.midtrans.com/transactions/{{ $d->id_transaksi }}" target="_blank" class="btn btn-icon btn-info" data-toggle="tooltip" data-placement="top" title="" data-original-title="Detail"><i class="fas fa-eye"></i></a>
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
</div>
@endsection

@section('scriptlib')
<!-- JS Libraies -->
<script src="{{ asset('assets/modules/dropify/dist/js/dropify.js') }}"></script>
<script src="{{ asset('assets/modules/datatables/datatables.min.js') }}"></script>
<script src="{{ asset('assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/modules/sweetalert/sweetalert.min.js') }}"></script>
<script src="{{ asset('assets/modules/jquery-selectric/jquery.selectric.min.js') }}"></script>
<script src="{{ asset('assets/modules/select2/dist/js/select2.full.min.js') }}"></script>
@endsection

@section('scriptpage')
<!-- Page Specific JS File -->
<script src="{{ asset('assets/js/page/modules-datatables.js') }}"></script>
<script src="{{ asset('assets/js/views/file.js') }}"></script>
@endsection
