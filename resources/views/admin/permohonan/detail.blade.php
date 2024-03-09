@extends('layouts.main')

@section('content')
<div class="content-body">
  <div class="container pd-x-0">
    <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
      <div>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb breadcrumb-style1 mg-b-10">
            <li class="breadcrumb-item"><a href="#">Permohonan</a></li>
            <li class="breadcrumb-item " aria-current="page">Permohonan Penelitian</li>
            <li class="breadcrumb-item active" aria-current="page">Detail</li>
          </ol>
        </nav>
        <h4 class="mg-b-0 tx-spacing--1">Detail Permohonan Penelitian</h4>
      </div>
      <div class="d-none d-md-block">
        <a href="{{Route('biodataPemohonCetak',['uuid'=>$data->uuid])}}" class="btn btn-sm pd-x-15 btn-white btn-uppercase mg-l-5"><i data-feather="printer"
            class="wd-10 mg-r-5"></i> Print</a>
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
                <div class="form-group">
                  <p class="tx-medium mg-b-2"><a href="" class="link-01">Alamat</a></p>
                  <span class="tx-12 tx-color-03">{{$data->alamat}}</span>
                </div>
                <div class="form-group">
                  <p class="tx-medium mg-b-2"><a href="" class="link-01">Tempat, tanggal lahir</a></p>
                  <span class="tx-12 tx-color-03">{{$data->tempat_lahir}},
                    {{carbon\carbon::parse($data->tanggal_lahir)->translatedFormat('d F Y')}}</span>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <p class="tx-medium mg-b-2"><a href="" class="link-01">Pendidikan Terakhir</a></p>
                  <span class="tx-12 tx-color-03">{{$data->pendidikan_terakhir}}</span>
                </div>
                <div class="form-group">
                  <p class="tx-medium mg-b-2"><a href="" class="link-01">Objek Penelitian</a></p>
                  <span class="tx-12 tx-color-03">{{$data->objek_penelitian->nama}}</span>
                </div>
                <div class="form-group">
                  <p class="tx-medium mg-b-2"><a href="" class="link-01">Detail keperluan</a></p>
                  <span class="tx-12 tx-color-03">{{$data->keperluan}}</span>
                </div>
                <div class="form-group">
                  <p class="tx-medium mg-b-2"><a href="" class="link-01">Status</a></p>
                  @if($data->status == 1)
                    <span class="badge badge-warning">Pending</span>
                    @elseif($data->status == 2)
                    <span class="badge badge-success">Disetujui</span>
                    @else
                    <span class="badge badge-danger">Ditolak</span>
                    @endif                
                  </div>
                  @if($data->catatan)
                  <div class="form-group">
                    <p class="tx-medium mg-b-2"><a href="" class="link-01">Catatan Ditolak</a></p>
                    <span class="tx-12 tx-color-03">{{$data->catatan}}</span>
                </div>
                @endif
                  @if($data->tanggal_pemanggilan)
                  <div class="form-group">
                    <p class="tx-medium mg-b-2"><a href="" class="link-01">Tanggal Panggilan</a></p>
                    <span class="tx-12 tx-color-03">{{$data->tanggal_pemanggilan}}</span>
                </div>
                @endif
                <div class="form-group">
                  <p class="tx-medium mg-b-2"><a href="" class="link-01">File Lampiran</a></p>
                  <span class="tx-12 tx-color-03"><a href="{{Route('lampiranPreview',['uuid' => $data->uuid])}}"
                      class="btn btn-xs btn-secondary pd-y-5 pd-x-7" target="_blank"><i data-feather="paperclip"></i>
                      Lampiran
                      File</a></span>
                </div>
              </div>
            </div>
          </div>
          <div class="card-footer text-right">
            <button class="btn btn-sm pd-x-15 btn-primary btn-uppercase mg-l-5" id="verifikasi-btn"><i
                data-feather="check-circle" class="wd-10 mg-r-5"></i> Verifikasi</button>
          </div>
        </div>
      </div>
    </div><!-- row -->
  </div><!-- container -->
</div>

<!-- modal -->
<div class="modal fade" id="modal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content tx-14">
      <div class="modal-header">
        <h6 class="modal-title" id="exampleModalLabel2">Verifikasi Permohonan</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="post" enctype="multipart/form-data">
          @method('PUT')
          @csrf
          <input type="hidden" value="{{$data->uuid}}">
          <div class="form-group">
            <label for="Nama">Status</label>
            <select name="status" id="status" class="form-control">
              <option value="1" {{$data->status == 1 ? 'selected' : ''}}>Pending</option>
              <option value="2" {{$data->status == 2 ? 'selected' : ''}}>Disetujui</option>
              <option value="3" {{$data->status == 3 ? 'selected' : ''}}>Ditolak</option>
            </select>
          </div>
          <div class="" id="tanggalform">
            <div class="form-group">
              <label for="Nama">Tanggal Panggilan</label>
              <input type="date" name="tanggal_pemanggilan" class="form-control">
            </div>
          </div>
          <div class="" id="catatanform">
            <div class="form-group">
              <label for="Nama">Catatan</label>
             <textarea name="catatan" id="catatan" class="form-control"></textarea>
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary tx-13" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary tx-13"><i data-feather="save" class="wd-10 mg-r-5"></i>
          Simpan</button>
      </div>
      </form>
    </div>
  </div>
</div>
@endsection
@section('scripts')
<script>
  $("#verifikasi-btn").click(function(){
            $('.modal-title').text('Verifikasi');
            $('#tanggalform').hide();
            $('#catatanform').hide();
            $('#modal2').modal('show');
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
</script>
@endsection