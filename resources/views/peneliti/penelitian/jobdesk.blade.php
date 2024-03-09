@extends('layouts.peneliti')

@section('content')
<div class="content-body">
  <div class="container pd-x-0">
    <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
      <div>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb breadcrumb-style1 mg-b-10">
            <li class="breadcrumb-item"><a href="#">Penelitian</a></li>
            <li class="breadcrumb-item active" aria-current="page">Data</li>
          </ol>
        </nav>
        <h4 class="mg-b-0 tx-spacing--1">Data Penelitian </h4>
      </div>
      <div class="d-none d-md-block">
        <a href="{{Route('jobdeskCetak',['uuid'=>$data->uuid])}}"
          class="btn btn-sm pd-x-15 btn-white btn-uppercase mg-l-5" target="_blank"><i data-feather="printer"
            class="wd-10 mg-r-5"></i> Print</a>
      </div>
    </div>
    <div class="row row-xs">
      <div class="col-md-12 col-xl-12 mg-t-10">
        @foreach($data->jobdesk as $d)
        <div class="card card-body mg-b-10">
          <p>
            <a class="btn btn-secondary" data-toggle="collapse" href="#collapseExample" aria-controls="collapseExample">
              {{carbon\carbon::parse($d->created_at)->translatedFormat('d F Y')}}
            </a>
            @if(!$d->jobdesk_peneliti)
            <button id="tambahVerif" data-id="{{$d->id}}" class="btn btn-success btn-icon" data-toggle="tooltip"
              data-placement="top" title="Upload Berkas Kegiatan" data-toggle="modal"><i
                data-feather="upload"></i></button>
            @endif
          </p>
          <div class="collapse" id="collapseExample">
            <div class="card card-body">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <p class="tx-medium mg-b-2"><a href="" class="link-01">Uraian Tugas</a></p>
                    <span class="tx-12 tx-color-03">{{$d->uraian}}</span>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <p class="tx-medium mg-b-2"><a href="" class="link-01">Pembimbing</a></p>
                    <span class="tx-12 tx-color-03">{{$d->penelitian->user->nama}}</span>
                  </div>
                  <div class="form-group">
                    <p class="tx-medium mg-b-2"><a href="" class="link-01">Batas Waktu</a></p>
                    <span
                      class="tx-12 tx-color-03">{{carbon\carbon::parse($d->batas_pengerjaan)->translatedFormat('d F Y')}}</span>
                  </div>
                </div>
              </div>
            </div>
            @if($d->jobdesk_peneliti)
            <div class="card card-body mg-t-10">
              <div class="row">
                <div class="col-md-6">
                  <p> <b>File Upload:</b> </p>
                  <p>Uraian : {{$d->jobdesk_peneliti->uraian}}</p>
                  <p>Tanggal Upload:
                    {{carbon\carbon::parse($d->jobdesk_peneliti->created_at)->translatedFormat('d F Y')}}
                    @if(carbon\carbon::parse($d->jobdesk_peneliti->created_at)->translatedFormat('Y-m-d') <=
                      carbon\carbon::parse($d->batas_waktu)->translatedFormat('Y-m-d')) <span class="text-primary">
                        (Tepat Waktu)</span> @else <span class="text-danger"> (Terlambat)</span> @endif</p>
                </div>
                <div class="col-md-6">
                  <p>Status : @if($d->status == 0 ) Belum di Verifikasi @elseif($d->status == 1) Telah di Verifikasi
                    @else Revisi @endif</p>
                  <br>
                  @if($d->catatan)
                  <div class="alert alert-danger">
                    <p>Catatan : </p>
                    <p>{{$d->catatan}}</p>
                  </div>
                  @endif
                </div>
              </div>
              <div class="btn-group" role="group" aria-label="Basic example">
                <p>
                  <a href="{{asset('lampiran/jobdesk/'. $d->jobdesk_peneliti->file)}}"
                    class="btn btn-success btn-icon text-white" target="_blank"><i data-feather="paperclip"></i> File
                  </a>
                  <a class="btn btn-danger btn-icon"
                    href="{{Route('penelitiJobdeskDestroy',['uuid' => $d->jobdesk_peneliti->uuid])}}"><i
                      data-feather="delete"></i></a>
                </p>
              </div>
            </div>
            @endif
          </div>
        </div>
        @endforeach


      </div>
    </div>
  </div>
</div>

<!-- Modal Nilai Perbaikan-->
<div class="modal fade bd-example-modal-lg" id="modalVerif" tabindex="-1" role="dialog"
  aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Upload berkas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{Route('penelitiJobdeskStore')}}" method="post" enctype="multipart/form-data" id="formPerbaikan">
          @csrf
          <input type="hidden" name="id" id="jobdesk_id" value="">
          <div class="form-group">
            <label for="Nama">Uraian</label>
            <input type="text" name="uraian" id="uraian" class="form-control">
          </div>
          <div class="form-group">
            <label for="Nama">File</label>
            <input type="file" name="file" id="file" class="form-control">
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
  $("#tambahJob").click(function(){
    $('#modalJob').modal('show');
  });

  $("#tambahVerif").click(function(){
    $('#catatanform').hide();
    $('#modalVerif').modal('show');
    let id = $(this).data('id');
    $('#jobdesk_id').val(id);
  });

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

      $('#status').on('change',function(){
            let status = $('#status').val();
            if(status == 2){
                $('#tanggalform').show();
                $('#catatanform').hide();
            }else if(status == 3){
                $('#tanggalform').hide();
                $('#catatanform').show();
            }else{
                $('#tanggalform').hide();
                $('#catatanform').hide();
            }

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