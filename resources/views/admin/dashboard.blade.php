@extends('admin.appadmin')

@section('maincontent')
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
        <h1>Halaman Admin Web Almu'awanah</h1>
    </div>
    <div class="section-body">
      <h2 class="section-title">Dashboard</h2>
      
      <div class="row">
        <div class="col-12 mb-4">
          <div class="hero text-white green-gradient hero-bg-parallax mb-4" style="background : linear-gradient(rgba(21, 209, 112, 0.8), rgba(21, 209, 112, 0.9)), url({{ asset('adminAssets/img/bg-bangunan.jpg') }}) fixed center center;">
            <div class="hero-inner text-center">
              <h1>بِسْمِ اللهِ الرَّحْمٰنِ الرَّحِيْمِ</h1>
              <br>
              <h4 class="lead">Halo {{ Auth::user()->name }}! Selamat datang di Halaman Admin Yayasan Al-Mu'awanah</p>
              <div class="mt-4">
                <h4>Current Time: <span id="datetime"></span></h4>
              </div>
            </div>
          </div>
          @unlessrole('superadmin|admin_yys|admin_ra|admin_tka|admin_mts|admin_ma|admin_pst')
          <div class="alert alert-danger alert-has-icon">
            <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
            <div class="alert-body">
              <div class="alert-title">Perhatian</div>
              Akun anda belum aktif, hubungi Admin untuk aktivasi akses!
            </div>
          </div>
          @endunlessrole

        </div>
      </div>            
    </div>
  </section>
</div>
@endsection
@section('scriptline')

@endsection