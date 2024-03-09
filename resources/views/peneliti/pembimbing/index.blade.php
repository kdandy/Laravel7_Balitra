@extends('layouts.peneliti')

@section('content')
<div class="content-body">
  <div class="container pd-x-0">
    <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
      <div>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb breadcrumb-style1 mg-b-10">
            <li class="breadcrumb-item"><a href="#">Pegawai</a></li>
            <li class="breadcrumb-item active" aria-current="page">Pembimbing Lapangan</li>
          </ol>
        </nav>
        <h4 class="mg-b-0 tx-spacing--1">Pembimbing Lapangan </h4>
      </div>
      <div class="d-none d-md-block">
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
                  <th>NIP</th>
                  <th>Nama</th>
                  <th>Alamat</th>
                  <th>No Hp</th>
                </tr>
              </thead>
              <tbody>
                @foreach($data as $d)
                <tr>
                  <td>{{$loop->iteration}}</td>
                  <td>{{$d->data_personal->NIP}}</td>
                  <td>{{$d->nama}}</td>
                  <td>{{$d->data_personal->alamat}}</td>
                  <td>{{$d->data_personal->no_hp}}</td>
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
        text: " Menghapus data user '" + nama ,        
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Hapus',
        cancelButtonText: 'Batal'
      }).then((result) => {
        if (result.value) {
          url = '{{route("pembimbingDestroy",'')}}';
          window.location.href =  url+'/'+uuid ;
        }
      })
        }
  </script>
  @endsection