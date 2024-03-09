@extends('layouts.main')

@section('content')
<div class="content-body">
  <div class="container pd-x-0">
    <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
      <div>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb breadcrumb-style1 mg-b-10">
            <li class="breadcrumb-item"><a href="#">Peneliti</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit</li>
          </ol>
        </nav>
        <h4 class="mg-b-0 tx-spacing--1">Edit Peneliti</h4>
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
                <label for="">Nama Lengkap</label>
                <input type="text" name="nama" value="{{$data->user->nama}}" class="form-control">
              </div>
              <div class="form-group">
                <label for="">NIK</label>
                <input type="text" name="NIK" value="{{$data->NIK}}" class="form-control">
              </div>
              <div class="form-group">
                <label for="">Alamat</label>
                <textarea name="alamat" id="" class="form-control">{{$data->alamat}}</textarea>
              </div>
              <div class="form-group">
                <label for="">No Telepon</label>
                <input type="text" name="no_hp" value="{{$data->no_hp}}" class="form-control">
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="">Tempat Lahir</label>
                    <input type="text" name="tempat_lahir" value="{{$data->tempat_lahir}}" class="form-control">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="">Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir" value="{{$data->tanggal_lahir}}" class="form-control">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="">Pendidikan Terakhir</label>
                <select name="pendidikan_terakhir" id="" class="form-control">
                  <option value="">-- Pilih Pendidikan Terakhir --</option>
                  <option value="SD" {{$data->pendidikan_terakhir == 'SD' ? 'selected' : ''}}>SD</option>
                  <option value="SMP" {{$data->pendidikan_terakhir == 'SMP' ? 'selected' : ''}}>SMP</option>
                  <option value="SMA/SMK" {{$data->pendidikan_terakhir == 'SMA/SMK' ? 'selected' : ''}}>SMA/SMK</option>
                  <option value="D3" {{$data->pendidikan_terakhir == 'D3' ? 'selected' : ''}}>D3</option>
                  <option value="D4" {{$data->pendidikan_terakhir == 'D4' ? 'selected' : ''}}>D4</option>
                  <option value="S1" {{$data->pendidikan_terakhir == 'S1' ? 'selected' : ''}}>S1</option>
                  <option value="S2" {{$data->pendidikan_terakhir == 'S2' ? 'selected' : ''}}>S2</option>
                  <option value="S3" {{$data->pendidikan_terakhir == 'S3' ? 'selected' : ''}}>S3</option>
                </select>
              </div>
              <div class="form-group">
                <label for="Nama">Username</label>
                <input type="text" name="username" value="{{$data->user->username}}" class="form-control"
                  placeholder="Username">
                {{-- <p class="text-danger">Isi jika ingin mengubah Username</p> --}}
              </div>
              <div class="form-group">
                <label for="Nama">Password</label>
                <input type="password" name="password" class="form-control" placeholder="username">
                <p class="text-danger">Isi jika ingin mengubah Password</p>
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