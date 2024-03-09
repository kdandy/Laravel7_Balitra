@extends('layouts.pembimbing')

@section('content')
<div class="content-body">
  <div class="container pd-x-0">
    <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
      <div>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb breadcrumb-style1 mg-b-10">
            <li class="breadcrumb-item"><a href="#">Laporan HasilPenelitian</a></li>
            <li class="breadcrumb-item active" aria-current="page">Data</li>
          </ol>
        </nav>
        <h4 class="mg-b-0 tx-spacing--1">Laporan Hasil Penelitian</h4>
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
                  <th>Peneliti</th>
                  <th>Pembimbing</th>
                  <th>Laporan Hasil</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach($data as $d)
                <tr>
                  <td>{{$loop->iteration}}</td>
                  <td>{{$d->peneliti->user->nama}}</td>
                  <td>{{$d->user->nama}}</td>
                  <td>
                    @if($d->hasil_penelitian)
                      <a href="{{asset('lampiran/hasilPenelitian/'.$d->hasil_penelitian->file)}}" class="btn btn-success btn-icon text-white" data-toggle="tooltip" data-placement="top" title="Download Laporan Hasil Penelitian "  ><i data-feather="printer"></i> </a>
                    @else
                      Belum ada Laporan Penelitian
                    @endif
                  </td>                  
                  <td>
                  @if($d->hasil_penelitian)
                    <a href="{{Route('PembimbingLaporanPenelitianDetail',['uuid'=>$d->uuid])}}" class="btn btn-default btn-warning btn-sm   p-2">
                      <i data-feather="info"></i>
                    </a>
                  @else
                  -
                  @endif
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

      function Hapus(uuid, nama) {
        Swal.fire({
        title: 'Anda Yakin?',
        text: " Menghapus data Penelitian '" + nama ,        
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Hapus',
        cancelButtonText: 'Batal'
      }).then((result) => {
        if (result.value) {
          url = '{{route("penelitianDestroy",'')}}';
          window.location.href =  url+'/'+uuid ;
        }
      })
        }
</script>
@endsection