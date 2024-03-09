@extends('layouts.main')

@section('content')
<div class="content-body">
  <div class="container pd-x-0">
    <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
      <div>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb breadcrumb-style1 mg-b-10">
            <li class="breadcrumb-item"><a href="#"> User</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit</li>
          </ol>
        </nav>
        <h4 class="mg-b-0 tx-spacing--1">Edit Pejabat</h4>
      </div>
    </div>

    <div class="row row-xs">
      <div class="col-md-12 col-xl-12 mg-t-10">
        <div class="card card-body ">
          <form action="" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
              <label for="Nama">Nama</label>
              <input type="text" name="nama" class="form-control" value="{{$data->nama}}" placeholder="Nama" required>
            </div>
            <div class="form-group">
              <label for="Nama">NIP</label>
              <input type="text" name="NIP" class="form-control" value="{{$data->data_personal->NIP}}" placeholder="NIP"
                required>
            </div>
            <div class="form-group">
              <label for="Nama">Jabatan</label>
              <input type="text" name="jabatan" class="form-control" value="{{$data->data_personal->jabatan}}"
                placeholder="Jabatan" required>
            </div>
            <div class="form-group">
              <label for="Nama">No Hp</label>
              <input type="text" name="no_hp" class="form-control" value="{{$data->data_personal->no_hp}}"
                placeholder="No Hp" required>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="Nama">Tempat Lahir</label>
                  <input type="text" name="tempat_lahir" class="form-control"
                    value="{{$data->data_personal->tempat_lahir}}" placeholder="Tempat Lahir" required>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="Nama">Tanggal Lahir</label>
                  <input type="date" name="tanggal_lahir" class="form-control"
                    value="{{$data->data_personal->tanggal_lahir}}" placeholder="Tanggal Lahir" required>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="Nama">Alamat</label>
              <input type="text" name="alamat" class="form-control" value="{{$data->data_personal->alamat}}"
                placeholder="ALamat" required>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="Nama">Username</label>
                  <input type="text" name="username" class="form-control" value="{{$data->username}}"
                    placeholder="Username" required>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="Nama">Password</label>
                  <input type="password" name="password" class="form-control" placeholder="username">
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