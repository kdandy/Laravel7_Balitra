@extends('layouts.pejabat')

@section('content')
<div class="content-body">
  <div class="container pd-x-0">
    <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
      <div>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb breadcrumb-style1 mg-b-10">
            <li class="breadcrumb-item"><a href="#">Permohonan</a></li>
            <li class="breadcrumb-item " aria-current="page">Permohonan Penelitian</li>
            <li class="breadcrumb-item active" aria-current="page">Detail</li>
          </ol>
        </nav>
        <h4 class="mg-b-0 tx-spacing--1">Detail Penelitian</h4>
      </div>
      <div class="d-none d-md-block">
      </div>
    </div>

    <div class="row row-xs">
      <div class="col-md-12 col-xl-12 mg-t-10">
        <div class="card ">
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <p class="tx-medium mg-b-2"><a href="" class="link-01">Nama</a></p>
                  <span class="tx-12 tx-color-03">{{$data->peneliti->user->nama}}</span>
                </div>
                <div class="form-group">
                  <p class="tx-medium mg-b-2"><a href="" class="link-01">NIK</a></p>
                  <span class="tx-12 tx-color-03">{{$data->peneliti->NIK}}</span>
                </div>
                <div class="form-group">
                  <p class="tx-medium mg-b-2"><a href="" class="link-01">Telepon</a></p>
                  <span class="tx-12 tx-color-03">{{$data->peneliti->no_hp}}</span>
                </div>
                <div class="form-group">
                  <p class="tx-medium mg-b-2"><a href="" class="link-01">Alamat</a></p>
                  <span class="tx-12 tx-color-03">{{$data->peneliti->alamat}}</span>
                </div>
                <div class="form-group">
                  <p class="tx-medium mg-b-2"><a href="" class="link-01">Tempat, tanggal lahir</a></p>
                  <span class="tx-12 tx-color-03">{{$data->peneliti->tempat_lahir}},
                    {{carbon\carbon::parse($data->peneliti->tanggal_lahir)->translatedFormat('d F Y')}}</span>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <p class="tx-medium mg-b-2"><a href="" class="link-01">Pembimbing penelitian</a></p>
                  <span class="tx-12 tx-color-03">{{$data->user->nama}}</span>
                </div>
                <div class="form-group">
                  <p class="tx-medium mg-b-2"><a href="" class="link-01">Objek Penelitian</a></p>
                  <span class="tx-12 tx-color-03">{{$data->objek_penelitian->nama}}</span>
                </div>
                  <div class="form-group">
                    <p class="tx-medium mg-b-2"><a href="" class="link-01">Uraian Penelitian</a></p>
                    <span class="tx-12 tx-color-03">{{$data->uraian}}</span>
                </div>
                <div class="form-group">
                    <p class="tx-medium mg-b-2"><a href="" class="link-01">Estimasi</a></p>
                    <span class="tx-12 tx-color-03">{{$data->estimasi}} Hari Kerja</span>
                </div>
              </div>
            </div>
          </div>
          <div class="card-footer text-right">
          <a href="{{Route('skPenelitian',['uuid'=>$data->uuid])}}" class="btn btn-sm pd-x-15 btn-primary btn-uppercase mg-l-5" id="verifikasi-btn" target="_blank"><i
                data-feather="file-text" class="wd-10 mg-r-5"></i> Cetak SK Penelitian</a>
            <a href="{{Route('jobdeskIndex',['uuid'=>$data->uuid])}}" class="btn btn-sm pd-x-15 btn-primary btn-uppercase mg-l-5" id="verifikasi-btn"><i
                data-feather="file-text" class="wd-10 mg-r-5"></i> Kegiatan</a>
          </div>
        </div>
      </div>
    </div><!-- row -->
  </div><!-- container -->
</div>

@endsection
@section('scripts')
<script>
  $("#verifikasi-btn").click(function(){
            $('.modal-title').text('Verifikasi');
            $('#tanggalform').hide();
            $('#modal2').modal('show');
        });

        $('#status').on('change',function(){
            let status = $('#status').val();
            if(status == 2){
                $('#tanggalform').show();
            }else{
                $('#tanggalform').hide();
            }
      });
</script>
@endsection