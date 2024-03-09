@extends('layouts.main')

@section('content')
<div class="content-body">
  <div class="container pd-x-0">
    <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
      <div>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb breadcrumb-style1 mg-b-10">
            <li class="breadcrumb-item"><a href="#">Peneliti</a></li>
            <li class="breadcrumb-item active" aria-current="page">Detail</li>
          </ol>
        </nav>
        <h4 class="mg-b-0 tx-spacing--1">Detail Peneliti</h4>
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
                  <span class="tx-12 tx-color-03">{{$data->user->nama}}</span>
                </div>
                <div class="form-group">
                  <p class="tx-medium mg-b-2"><a href="" class="link-01">NIK</a></p>
                  <span class="tx-12 tx-color-03">{{$data->NIK}}</span>
                </div>
                <div class="form-group">
                  <p class="tx-medium mg-b-2"><a href="" class="link-01">Telepon</a></p>
                  <span class="tx-12 tx-color-03">{{$data->no_hp}}</span>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <p class="tx-medium mg-b-2"><a href="" class="link-01">Alamat</a></p>
                  <span class="tx-12 tx-color-03">{{$data->alamat}}</span>
                </div>
                <div class="form-group">
                  <p class="tx-medium mg-b-2"><a href="" class="link-01">Tempat, tanggal lahir</a></p>
                  <span class="tx-12 tx-color-03">{{$data->tempat_lahir}},
                    {{carbon\carbon::parse($data->tanggal_lahir)->translatedFormat('d F Y')}}</span>
                </div>
                <div class="form-group">
                  <p class="tx-medium mg-b-2"><a href="" class="link-01">Pendidikan Terakhir</a></p>
                  <span class="tx-12 tx-color-03">{{$data->pendidikan_terakhir}}</span>
                </div>
              </div>
            </div>
          </div>
          <div class="card-footer text-right">
          </div>
        </div>
      </div>
    </div><!-- row -->
  </div><!-- container -->

</div><!-- container -->
</div>

@endsection
@section('scripts')
<script>
  $(function(){
        'use strict'

        $('#dataTable').DataTable({
          language: {
            searchPlaceholder: 'Search...',
            sSearch: '',
            lengthMenu: '_MENU_ items/page',
          }
        });
      });
</script>
@endsection