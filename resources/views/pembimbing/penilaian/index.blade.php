@extends('layouts.pembimbing')

@section('content')
<div class="content-body">
  <div class="container pd-x-0">
    <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
      <div>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb breadcrumb-style1 mg-b-10">
            <li class="breadcrumb-item"><a href="#">Penilaian Penelitian </a></li>
            <li class="breadcrumb-item active" aria-current="page">Data</li>
          </ol>
        </nav>
        <h4 class="mg-b-0 tx-spacing--1">Data Penilaian Penelitian {{$penelitian->objek_penelitian->nama}} oleh {{$penelitian->peneliti->user->nama}}</h4>
      </div>
      <div class="d-none d-md-block">
        <a href="{{Route('penilaianCetak',['uuid'=>$penelitian->uuid])}}" class="btn btn-sm pd-x-15 btn-white btn-uppercase mg-l-5"
          target="_blank"><i data-feather="printer" class="wd-10 mg-r-5"></i> Cetak</a>
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
                  <th>Objek Penilaian</th>
                  <th>Nilai</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach($data as $d)
                <tr>
                  <td>{{$loop->iteration}}</td>
                  <td>{{$d->objek_penilaian}}</td>
                  <td>
                    @php
                    $nilai =$d->hasil_penilaian()->where('penelitian_id',$penelitian->id)->where('penilaian_id',$d->id)->pluck('nilai')
                    @endphp

                    {{preg_replace('/[^\p{L}\p{N}\s]/u', '', $nilai)}}
                  </td>
                  <td>
                    @if(!$d->hasil_penilaian()->where('penelitian_id',$penelitian->id)->first())
                    <button data-status="" data-id="{{$d->id}}" class="btn btn-success tambahVerif btn-icon"
                      data-toggle="tooltip" data-placement="top" title="Verifikasi" data-toggle="modal"><i
                        data-feather="check"></i> Input Nilai</button>
                    @else
                    <a href="{{Route('resetPenilaian',['uuid'=>$d->hasil_penilaian()->where('penelitian_id',$penelitian->id)->first()->uuid])}}" class="btn btn-danger btn-icon"> <i data-feather="refresh-cw"></i> Reset Nilai</a>
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

<!-- Modal Nilai Perbaikan-->
<div class="modal fade bd-example-modal-lg" id="modalVerif" tabindex="-1" role="dialog"
  aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Input Nilai</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{Route('penilaianStore')}}" method="post" enctype="multipart/form-data" id="formPerbaikan">
          @csrf
          <div class="" id="catatanform">
            <div class="form-group">
              <label for="Nama">Nilai</label>
              <input type="hidden" name="id" id="id">
              <input type="hidden" name="penelitian_id" value="{{$penelitian->id}}">
              <input type="number" class="form-control" name="nilai" required>
            </div>
          </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn " data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-info"> <i class="far fa-save"></i> Simpan</button>
        </form>
      </div>
    </div>
  </div>
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

  $(".tambahVerif").click(function(){
    var id = $(this).data("id");
    $('#modalVerif').modal('show');
    $('#id').val(id);
  });

</script>
@endsection