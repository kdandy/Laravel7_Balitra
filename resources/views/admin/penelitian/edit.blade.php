@extends('layouts.main')

@section('content')
<div class="content-body">
  <div class="container pd-x-0">
    <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
      <div>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb breadcrumb-style1 mg-b-10">
            <li class="breadcrumb-item"><a href="#">Penelitian</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit</li>
          </ol>
        </nav>
        <h4 class="mg-b-0 tx-spacing--1">Edit Penelitian</h4>
      </div>
    </div>

    <div class="row row-xs">
      <div class="col-md-12 col-xl-12 mg-t-10">
        <div class="card">
          <div class="card-body">
            <form action="" method="post">
              {{method_field('PUT') }}
              @csrf
              <div class="form-group">
                <label for="Nama">Pembimbing</label>
                <select name="user_id" id="" class="form-control">
                  <option value="">-- Pilih Pembimbing --</option>
                  @foreach($pembimbing as $d)
                  <option value="{{$d->id}}" {{$d->id == $data->user_id ? 'selected' : ''}}>{{$d->nama}}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="Nama">Objek Penelitian</label>
                <select name="objek_penelitian_id" id="" class="form-control">
                  <option value="">-- Pilih Objek Penelitian --</option>
                  @foreach($objek as $d)
                  <option value="{{$d->id}}" {{$d->id == $data->objek_penelitian_id ? 'selected' : ''}}>{{$d->nama}}
                  </option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="Nama">Uraian</label>
                <textarea name="uraian" id="" class="form-control">{{$data->uraian}}</textarea>
              </div>
              <div class="form-group">
                <label for="Nama">Estimasi (Hari Kerja)</label>
                <input type="number" name="estimasi" value="{{$data->estimasi}}" class="form-control">
              </div>
              <div class="form-group">
                <label for="Nama">Status Penelitian</label>
                <select name="status" id="" class="form-control">
                  <option value="">-- Pilih Status Penelitian --</option>
                  <option value="0" {{$data->status == 0 ? 'selected' : ''}}>On Progress</option>
                  <option value="1" {{$data->status == 1 ? 'selected' : ''}}>Ditunda</option>
                  <option value="2" {{$data->status == 2 ? 'selected' : ''}}>Selesai</option>
                </select>
              </div>
          </div>
          <div class="card-footer text-right">
            <button type="button" class="btn btn-secondary tx-13" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary tx-13"><i data-feather="save" class="wd-10 mg-r-5"></i>
              Simpan</button>
          </div>
          </form>
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