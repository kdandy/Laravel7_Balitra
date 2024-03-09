@extends('layouts.main')

@section('content')
<div class="content-body">
        <div class="container pd-x-0">
          <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
            <div>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-style1 mg-b-10">
                  <li class="breadcrumb-item"><a href="#">Beranda</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Admin</li>
                </ol>
              </nav>
              <h4 class="mg-b-0 tx-spacing--1">Beranda Admin</h4>
            </div>
            <div class="d-none d-md-block">
              <a href="/" class="btn btn-sm pd-x-15 btn-primary btn-uppercase mg-l-5"><i data-feather="home" class="wd-10 mg-r-5"></i> Halaman Depan</a>
            </div>
          </div>

          <div class="row row-xs">
            <div class="col-sm-6 col-lg-3">
              <div class="card card-body">
                <h6 class="tx-uppercase tx-11 tx-spacing-1 tx-color-02 tx-semibold mg-b-8">Permohonan Penelitian</h6>
                <div class="d-flex d-lg-block d-xl-flex align-items-end">
                  <h3 class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1">{{$permohonan->count()}}</h3>
                  <p class="tx-11 tx-color-03 mg-b-0"><span class="tx-medium tx-success">Permohonan </span></p>
                </div>
                <div class="chart-three">
                    <div id="flotChart3" class="flot-chart ht-30"></div>
                  </div><!-- chart-three -->
              </div>
            </div><!-- col -->
            <div class="col-sm-6 col-lg-3 mg-t-10 mg-sm-t-0">
              <div class="card card-body">
                <h6 class="tx-uppercase tx-11 tx-spacing-1 tx-color-02 tx-semibold mg-b-8">Kegiatan Penelitian</h6>
                <div class="d-flex d-lg-block d-xl-flex align-items-end">
                  <h3 class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1">{{$penelitian->count()}}</h3>
                  <p class="tx-11 tx-color-03 mg-b-0"><span class="tx-medium tx-danger">Kegiatan Penelitian </span></p>
                </div>
                <div class="chart-three">
                    <div id="flotChart4" class="flot-chart ht-30"></div>
                  </div><!-- chart-three -->
              </div>
            </div><!-- col -->
            <div class="col-sm-6 col-lg-3 mg-t-10 mg-lg-t-0">
              <div class="card card-body">
                <h6 class="tx-uppercase tx-11 tx-spacing-1 tx-color-02 tx-semibold mg-b-8">Pembimbing Lapangan</h6>
                <div class="d-flex d-lg-block d-xl-flex align-items-end">
                  <h3 class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1">{{$pembimbing->count()}}</h3>
                  <p class="tx-11 tx-color-03 mg-b-0"><span class="tx-medium tx-danger">Orang</span></p>
                </div>
                <div class="chart-three">
                    <div id="flotChart5" class="flot-chart ht-30"></div>
                  </div><!-- chart-three -->
              </div>
            </div><!-- col -->
            <div class="col-sm-6 col-lg-3 mg-t-10 mg-lg-t-0">
              <div class="card card-body">
                <h6 class="tx-uppercase tx-11 tx-spacing-1 tx-color-02 tx-semibold mg-b-8">Objek Penelitian</h6>
                <div class="d-flex d-lg-block d-xl-flex align-items-end">
                  <h3 class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1">{{$objek->count()}}</h3>
                  <p class="tx-11 tx-color-03 mg-b-0"><span class="tx-medium tx-success">Macam</span></p>
                </div>
                <div class="chart-three">
                    <div id="flotChart6" class="flot-chart ht-30"></div>
                  </div><!-- chart-three -->
              </div>
            </div><!-- col -->
            <div class="col-sm-6 col-lg-6 mg-t-10 mg-lg-t-10">
              <div class="card card-body">
                <h6 class="tx-uppercase tx-11 tx-spacing-1 tx-color-02 tx-semibold mg-b-8">Fasilitas</h6>
                <div class="d-flex d-lg-block d-xl-flex align-items-end">
                  <h3 class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1">{{$fasilitas->count()}}</h3>
                  <p class="tx-11 tx-color-03 mg-b-0"><span class="tx-medium tx-success"> Fasilitas</span></p>
                </div>
                <div class="chart-three">
                    <div id="flotChart6" class="flot-chart ht-30"></div>
                  </div><!-- chart-three -->
              </div>
            </div><!-- col -->
            <div class="col-sm-6 col-lg-6 mg-t-10 mg-lg-t-10">
              <div class="card card-body">
                <h6 class="tx-uppercase tx-11 tx-spacing-1 tx-color-02 tx-semibold mg-b-8">Laporan Penelitian</h6>
                <div class="d-flex d-lg-block d-xl-flex align-items-end">
                  <h3 class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1">{{$laporanPenelitian->count()}}</h3>
                  <p class="tx-11 tx-color-03 mg-b-0"><span class="tx-medium tx-success">Berkas</span></p>
                </div>
                <div class="chart-three">
                    <div id="flotChart6" class="flot-chart ht-30"></div>
                  </div><!-- chart-three -->
              </div>
            </div><!-- col -->
            <!-- disini -->
            <div class="col-md-12 col-xl-12 mg-t-10">
            <div class="card card-body ht-lg-100">
                <div class="media">
                  <span class="tx-color-04"><i data-feather="message-circle" class="wd-60 ht-60"></i></span>
                  <div class="media-body mg-l-20">
                    <h6 class="mg-b-10">Selamat Datang Admin {{Auth::user()->nama}}</h6>
                    <p class="tx-color-03 mg-b-0">Selamat datang di Aplikasi Pelayanan Kegiatan Penelitian BALITTRA</p>
                  </div>
                </div><!-- media -->
              </div>
            </div>
          </div><!-- row -->
        </div><!-- container -->
      </div>
@endsection
