@extends('layouts.main')

@section('content')
<div class="content-body">
        <div class="container pd-x-0">
          <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
            <div>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-style1 mg-b-10">
                  <li class="breadcrumb-item"><a href="#">fasilitas</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Fasilitas Penelitian</li>
                </ol>
              </nav>
              <h4 class="mg-b-0 tx-spacing--1">Fasilitas Penelitian</h4>
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
                      <label for="Nama">Nama Alat</label>
                      <input type="text" name="nama" class="form-control" placeholder="Nama" value="{{$data->nama}}" required>
                    </div>
                    <div class="form-group">
                      <label for="Nama">Kategori</label>
                      <select name="kategori" id="" class="form-control" required>
                        <option value="">-- Pilih Kategori --</option>
                        <option value="Bangunan" {{  $data->kategori == "Bangunan" ? 'selected' : ''}}>Bangunan</option>
                        <option value="Peralatan Kebun" {{  $data->kategori == "Peralatan Kebun" ? 'selected' : ''}}>Peralatan Kebun</option>
                        <option value="Lahan" {{  $data->kategori == "Lahan" ? 'selected' : ''}}>Lahan</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="Nama">Jumlah</label>
                      <input type="number" name="jumlah" class="form-control" placeholder="Jumlah" value="{{$data->jumlah}}" required>
                    </div>
                    <div class="form-group">
                      <label for="Nama">Satuan</label>
                      <input type="text" name="satuan" class="form-control" placeholder="Satuan" value="{{$data->satuan}}" required>
                    </div>
                    <div class="form-group">
                      <label for="Nama">Keterangan</label>
                      <textarea name="keterangan" id="keterangan" name="keterangan" class="form-control" required>{{$data->keterangan}}</textarea>
                    </div>
                    </div>
                    <div class="card-footer text-right">
                        <button type="button" class="btn btn-secondary tx-13" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary tx-13"><i data-feather="save" class="wd-10 mg-r-5"></i> Simpan</button>
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