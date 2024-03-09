@extends('layouts.main')

@section('content')
<div class="content-body">
  <div class="container pd-x-0">
    <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
      <div>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb breadcrumb-style1 mg-b-10">
            <li class="breadcrumb-item"><a href="#">Permohonan</a></li>
            <li class="breadcrumb-item active" aria-current="page">Permohonan Penelitian</li>
          </ol>
        </nav>
        <h4 class="mg-b-0 tx-spacing--1">Permohonan Penelitian</h4>
      </div>
      <div class="d-none d-md-block">
        <a href="{{Route('permohonanCetak')}}" class="btn btn-sm pd-x-15 btn-white btn-uppercase mg-l-5" target="_blank"><i data-feather="printer"
            class="wd-10 mg-r-5"></i> Print</a>
        <a href="{{Route('permohonanFilter')}}" class="btn btn-sm pd-x-15 btn-white btn-uppercase mg-l-5"><i data-feather="filter"
            class="wd-10 mg-r-5"></i> Filter Status</a>
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
                  <th>Nomor Telepon</th>
                  <th>Objek Penelitian</th>
                  <th>Keperluan</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach($data as $d)
                <tr>
                  <td>{{$loop->iteration}}</td>
                  <td>{{$d->user->nama}}</td>
                  <td>{{$d->no_hp}}</td>
                  <td>{{$d->objek_penelitian->nama}}</td>
                  <td>{{$d->keperluan}}</td>
                  <td>
                    @if($d->status == 1)
                    <span class="badge badge-warning">Pending</span>
                    @elseif($d->status == 2)
                    <span class="badge badge-success">Disetujui</span>
                    @else
                    <span class="badge badge-danger">Ditolak</span>
                    @endif
                  </td>
                  <td>
                    <a href="{{Route('permohonanShow',['uuid' => $d->uuid])}}"
                      class="btn btn-default btn-secondary btn-sm p-2">
                      <i data-feather="info"></i>
                    </a>
                    <!-- <button type="button" class="btn btn-primary btn-icon">
                      <i data-feather="edit"></i>
                    </button>
                    <button type="button" class="btn btn-danger btn-icon">
                      <i data-feather="delete"></i>
                    </button> -->
                  </td>
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