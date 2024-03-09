@extends('layouts.pembimbing')
@section('content')
@push('styles')
<link href="{{asset('admin/lib/summernote/summernote.min.css')}}" rel="stylesheet">
@endpush
<div class="content-body">
  <div class="container pd-x-0">
    <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
      <div>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb breadcrumb-style1 mg-b-10">
            <li class="breadcrumb-item"><a href="#">Hasil Penelitian</a></li>
            <li class="breadcrumb-item active" aria-current="page">Hasil Penelitian </li>
          </ol>
        </nav>
      </div>
      <div class="d-none d-md-block">
        <button id="tambahVerif" data-status="{{$data->hasil_penelitian->status}}"
          data-id="{{$data->hasil_penelitian->id}}" class="btn btn-success btn-icon" data-toggle="tooltip"
          data-placement="top" title="Verifikasi" data-toggle="modal"><i data-feather="check"></i> Verifikasi Laporan
          Akhir Penelitian </button>
        <a href="{{Route('inputPenilaian',['uuid'=> $data->uuid])}}" class="btn btn-primary btn-icon"
          data-toggle="tooltip" data-placement="top" title="Verifikasi" data-toggle="modal"><i
            data-feather="file-text"></i> Input Penilaian Penelitian</a>
      </div>
    </div>
    <div class="row row-xs">
      <div class="col-md-12 col-xl-12 mg-t-10">
        <div class="card card-body ">
          <h4>Rincian Penelitian</h4>
          <hr>
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
              <div class="form-group">
                <p class="tx-medium mg-b-2"><a href="" class="link-01">File Lampiran</a></p>
                <a href="{{Route('lampiranPreview',['uuid' => $data->uuid])}}"
                  class="btn btn-xs btn-secondary pd-y-5 pd-x-7" target="_blank"><i data-feather="paperclip"></i>
                  Lampiran File</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div><!-- row -->

    <div class="row row-xs">
      <div class="col-md-12 col-xl-12 mg-t-10">
        <div class="card card-body ">
          <h4>Laporan Hasil Penelitian</h4>
          <hr>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <p class="tx-medium mg-b-2"><a href="" class="link-01">Judul Laporan</a></p>
                <span class="tx-12 tx-color-03">{{$data->hasil_penelitian->judul}}</span>
              </div>
              <div class="form-group">
                <p class="tx-medium mg-b-2"><a href="" class="link-01">Waktu Upload</a></p>
                <span
                  class="tx-12 tx-color-03">{{carbon\carbon::parse($data->hasil_penelitian->created_at)->translatedFormat('d F Y')}}</span>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <p class="tx-medium mg-b-2"><a href="" class="link-01">file</a></p>
                <span class="tx-12 tx-color-03"><a href="#" class="btn btn-xs btn-secondary pd-y-5 pd-x-7"
                    target="_blank"><i data-feather="paperclip"></i>
                    File </a></span>
              </div>
              @if($data->hasil_penelitian->status == 0)
              <div class="alert alert-warning">
                <h5>Status</h5>
                <p>Menunggu Persetujuan Pembimbing</p>
              </div>
              @elseif($data->hasil_penelitian->status == 1)
              <div class="alert alert-success">
                <h5>Status</h5>
                <p>Disetujui Pembimbing</p>
              </div>
              @else
              <div class="alert alert-primary">
                <h5>Status</h5>
                <p>Revisi Pembimbing</p>
                <p>Catatan : {{$data->hasil_penelitian->catatan}}</p>
              </div>
              @endif
            </div>
          </div>
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
        <h5 class="modal-title" id="exampleModalLongTitle">Verifikasi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{Route('HasilPeneltianStatusUpdate')}}" method="post" enctype="multipart/form-data"
          id="formPerbaikan">
          @csrf
          @method('PUT')
          <input type="hidden" name="uuid" id="uuid">
          <div class="form-group">
            <label for="Nama">Status</label>
            <select name="status" id="status" class="form-control">
              <option value="0" {{$data->hasil_penelitian->status == 0 ? 'selected' : ''}}>Pending</option>
              <option value="1" {{$data->hasil_penelitian->status == 1 ? 'selected' : ''}}>Disetujui</option>
              <option value="2" {{$data->hasil_penelitian->status == 2 ? 'selected' : ''}}>Revisi</option>
            </select>
          </div>
          <div class="" id="catatanform">
            <div class="form-group">
              <label for="Nama">Catatan</label>
              <textarea name="catatan" id="catatan" class="form-control"></textarea>
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
<script src="{{asset('admin/lib/summernote/summernote.min.js')}}"></script>
<script>
  $("#tambahVerif").click(function(){
    $('#catatanform').hide();
    var uuid = $(this).data("id");
    var status = $(this).data("status");
    $('#modalVerif').modal('show');
    $('#status').val(status);
    $('#uuid').val(uuid);
  });

  $('#status').on('change',function(){
            let status = $('#status').val();
            if(status == 1){
                $('#tanggalform').show();
                $('#catatanform').hide();
            }else if(status == 2){
                $('#tanggalform').hide();
                $('#catatanform').show();
            }else{
                $('#tanggalform').hide();
                $('#catatanform').hide();
            }

      });
</script>
@endsection