@extends('layouts.main')

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
        <a href="{{Route('jobdeskCetak',['uuid'=>$data->uuid])}}" class="btn btn-sm pd-x-15 btn-white btn-uppercase mg-l-5"
          target="_blank"><i data-feather="printer" class="wd-10 mg-r-5"></i> Print</a>
      </div>
    </div>
    <div class="row row-xs">
      @foreach($data->jobdesk as $d)
      <div class="col-md-12 col-xl-12 mg-t-10">
        <div class="card card-body mg-b-10">
          <p>
            <a class="btn btn-secondary" data-toggle="collapse" href="#collapseExample" aria-controls="collapseExample">
            {{carbon\carbon::parse($d->created_at)->translatedFormat('d F Y')}} - {{$d->penelitian->user->nama}}
            </a>
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
                  <p> <b>file upload:</b> </p>
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
                </p>
              </div>
            </div>
            @endif
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</div>

@endsection
@section('scripts')
<script>

</script>
@endsection