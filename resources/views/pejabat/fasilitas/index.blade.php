@extends('layouts.pejabat')

@section('content')
<div class="content-body">
  <div class="container pd-x-0">
    <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
      <div>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb breadcrumb-style1 mg-b-10">
            <li class="breadcrumb-item"><a href="#">fasilitas</a></li>
            <li class="breadcrumb-item active" aria-current="page">Fasilitas Penelitian</li>
          </ol>
        </nav>
        <h4 class="mg-b-0 tx-spacing--1">Fasilitas Penelitian</h4>
      </div>
      <div class="d-none d-md-block">
        <a href="{{Route('fasilitasCetak')}}" class="btn btn-sm pd-x-15 btn-white btn-uppercase mg-l-5" target="_blank"><i data-feather="printer"
            class="wd-10 mg-r-5"></i> Print</a>
      </div>
    </div>

    <div class="row row-xs">
      <div class="col-md-12 col-xl-12 mg-t-10">
        <div class="card card-body ">
          <div data-label="Example" class="df-example demo-table">
            <table id="dataTable" class="table text-center">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Kategori</th>
                  <th>jumlah</th>
                  <th>Keterangan</th>
                </tr>
              </thead>
              <tbody>
                @foreach($data as $d)
                <tr>
                  <td>{{$loop->iteration}}</td>
                  <td>{{$d->nama}}</td>
                  <td>{{$d->kategori}}</td>
                  <td>{{$d->jumlah}} {{$d->satuan}}</td>
                  <td>{{$d->keterangan}}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div><!-- df-example -->
        </div>
      </div>
    </div><!-- row -->
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