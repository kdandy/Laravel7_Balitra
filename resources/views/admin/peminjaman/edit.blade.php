@extends('layouts.main')

@section('content')
<div class="content-body">
  <div class="container pd-x-0">
    <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
      <div>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb breadcrumb-style1 mg-b-10">
            <li class="breadcrumb-item"><a href="#">Peminjaman</a></li>
            <li class="breadcrumb-item active" aria-current="page">Peminjaman Fasilitas</li>
            <li class="breadcrumb-item active" aria-current="page">Edit</li>
          </ol>
        </nav>
        <h4 class="mg-b-0 tx-spacing--1">Peminjaman Fasilitas</h4>
      </div>
    </div>

    <div class="row row-xs">
      <div class="col-md-12 col-xl-12 mg-t-10">
        <div class="card ">
          <div class="card-body">
            <form action="" method="post">
              {{method_field('PUT') }}
              @csrf
              <div class="form-group">
                <select name="peneliti_id" id="peneliti_id" class="form-control">
                  <option value="">-- Pilih Peneliti --</option>
                  @foreach($peneliti as $d)
                  <option value="{{$d->peneliti->id}}" {{$d->peneliti->id == $data->peneliti_id ? 'selected' : ''}}>
                    {{$d->nama}}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="Nama">Fasilitas</label>
                <select name="fasilitas_id" id="fasilitas_id" class="form-control">
                  <option value="">-- Pilih fasilitas --</option>
                  @foreach($fasilitas as $d)
                  <option value="{{$d->id}}" {{$d->id == $data->fasilitas_id ? 'selected' : ''}}>{{$d->nama}}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
            <label for="Nama">Tujuan Penggunaan</label>
            <input type="text" name="tujuan_penggunaan" placeholder="" class="form-control" value="{{$data->tujuan_peminjaman}}" required>
          </div>
              <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="Nama">Tanggal Mulai Peminjaman</label>
                <input type="date" name="tanggal_mulai" placeholder="" class="form-control" value="{{$data->tanggal_mulai}}"  required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="Nama">Tanggal Pengembalian</label>
                <input type="date" name="tanggal_selesai" placeholder="" class="form-control" value="{{$data->tanggal_selesai}}" required>
              </div>
            </div>
          </div>
              <div class="card-footer text-right">
                <a href="{{route('objekPenelitianIndex')}}" type="button" class="btn btn-secondary tx-13"
                  data-dismiss="modal">Batal</a>
                <button type="submit" class="btn btn-primary tx-13"><i data-feather="save" class="wd-10 mg-r-5"></i>
                  Simpan</button>
              </div>
            </form>
          </div>
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