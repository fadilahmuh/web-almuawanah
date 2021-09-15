@extends('pages.appuser')

@section('csslib')
<link rel="stylesheet" href="{{ asset('assets/modules/datatables/datatables.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css') }}">
@endsection
@section('maincontent')

<section class="menu-wrap single-page-header d-flex bot-margin">
    <div class="container half-banner-content">
      <div class="row align-items-center justify-content-center">
        <div class="col text-center align-middle align-self-center ftco-animate" >
          <h1 data-aos="fade-up">File Download</h1>
        </div>
      </div>
    </div>
</section>

  <section class="both-margin">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
          <div class="card-body">
          <div class="table-responsive">
            <table class="table table-hover" id="table-file">
              <thead  class="text-center">
                <tr>
                  <th>Nama File</th>
                  <th>Tanggal Update</th>
                  <th>Download</th>
                </tr>
              </thead>
              <tbody class="text-center">
                @foreach($files as $f)
                <tr>
                  <td class="align-middle">{{ $f->nama }}</td>
                  <td class="align-middle">{{Carbon::parse($f->updated_at)->isoFormat('L')}}</td>
                  <td class="align-middle">
                    <div class="btn-toolbar justify-content-center" role="group">
                      <a href="{{asset('uploads/file/'.Str::replace(' ', '%20', $f->file))}}" target="_blank" class="btn btn-icon btn-primary" data-toggle="tooltip" data-placement="top" data-original-title="Download"><i class="fas fa-file-download"></i></a>
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
@endsection


@section("scriptlib")
<script src="{{ asset('assets/modules/datatables/datatables.min.js') }}"></script>
<script src="{{ asset('assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
@endsection

@section('scriptpage')
<script src="{{ asset('assets/js/page/modules-datatables.js') }}"></script>
@endsection