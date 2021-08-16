@extends('admin.appadmin')

@section('csslib')
<link rel="stylesheet" href="{{ asset('adminAssets/modules/datatables/datatables.min.css') }}">
<link rel="stylesheet" href="{{ asset('adminAssets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('adminAssets/modules/dropify/dist/css/dropify.css') }}">
@endsection

@section('maincontent')
<!-- Main Content -->
<div class="main-content">
    <section class="section">
      <div class="section-header">
          <h1>Kontak Yayasan Al-Mu'awanah</h1>
      </div>
      <div class="section-body">
        <h2 class="section-title">Daftar Kontak</h2>
        <!-- Content -->
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
                    <a href="#" class="btn btn-icon icon-right btn-success" data-toggle="modal" data-target="#kontakModal">
                      <i class="fas fa-plus"></i> 
                      Tambah Kontak
                    </a>                        
                  </div>                      
                </div>
                <br>
                <!-- Kontak Table -->

                <div class="table-responsive">
                  <table class="table table-striped" id="table-1">
                    <thead  class="text-center">
                      <tr>
                        <th>No</th>
                        <th>Jenis Kontak</th>
                        <th>Keterangan</th>
                        <th>Isi Kontak</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody class="text-center">
                      @foreach($kontak as $key=>$k)
                      <tr>
                        <td class="align-middle">{{++$key}}</td>
                        <td class="align-middle">{{ $k->judul }}</td>
                        <td class="align-middle">@isset($k->desc1) ({{$k->desc1}}) @endisset</td>
                        <td class="align-middle">{{ $k->content }}</td>
                        <td class="align-middle">
                          <div class="btn-toolbar justify-content-center" role="group">
                            <a href="" class="btn btn-icon btn-warning" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class="fas fa-edit"></i></a>
                            <form action="" method="POST">                              
                              @csrf
                              @method('delete')
                              <button class="del btn btn-icon btn-danger" data-judul="" data-toggle="tooltip" data-placement="top" title="" data-original-title="Hapus"><i class="fas fa-trash"></i></button>
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
</div>
@endsection

@section('scriptlib')
<!-- JS Libraies -->
<script src="{{ asset('adminAssets/modules/datatables/datatables.min.js') }}"></script>
<script src="{{ asset('adminAssets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('adminAssets/modules/sweetalert/sweetalert.min.js') }}"></script>
@endsection

@section('scriptpage')
<!-- Page Specific JS File -->
<script src="{{ asset('adminAssets/js/page/modules-datatables.js') }}"></script>
@endsection