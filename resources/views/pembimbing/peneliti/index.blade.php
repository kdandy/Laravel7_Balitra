@extends('layouts.pembimbing')

@section('content')
<div class="content-body">
  <div class="container pd-x-0">
    <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
      <div>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb breadcrumb-style1 mg-b-10">
            <li class="breadcrumb-item"><a href="#">Peneliti yang di bimbing</a></li>
          </ol>
        </nav>
        <h4 class="mg-b-0 tx-spacing--1">Peneliti yang di bimbing </h4>
      </div>
      <div class="d-none d-md-block">
        <!-- <a class="btn btn-sm pd-x-15 btn-white btn-uppercase mg-l-5" href="{{Route('penelitiCetak')}}"><i data-feather="printer"
            class="wd-10 mg-r-5"></i> Print</a> -->
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
                  <th>Alamat</th>
                  <th>Nomor Telepon</th>
                  <th>Tempat, Tanggal Lahir</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach($data as $d)
                <tr>
                  <td>{{$loop->iteration}}</td>
                  <td>{{$d->peneliti->user->nama}}</td>
                  <td>{{$d->peneliti->alamat}}</td>
                  <td>{{$d->peneliti->no_hp}}</td>
                  <td>{{$d->peneliti->tempat_lahir}}, {{carbon\carbon::parse($d->tanggal_lahir)->translatedFormat('d F Y')}}</td>
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

      function Hapus(uuid, nama) {
        Swal.fire({
        title: 'Anda Yakin?',
        text: " Menghapus data Peneliti '" + nama ,        
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Hapus',
        cancelButtonText: 'Batal'
      }).then((result) => {
        if (result.value) {
          url = '{{route("penelitiDestroy",'')}}';
          window.location.href =  url+'/'+uuid ;
        }
      })
        }
</script>
@endsection