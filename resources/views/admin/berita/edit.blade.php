@extends('layouts.main')

@section('content')
<div class="content-body">
  <div class="container pd-x-0">
    <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
      <div>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb breadcrumb-style1 mg-b-10">
            <li class="breadcrumb-item"><a href="#">Berita</a></li>
            <li class="breadcrumb-item active" aria-current="page">Berita</li>
            <li class="breadcrumb-item active" aria-current="page">Edit</li>
          </ol>
        </nav>
        <h4 class="mg-b-0 tx-spacing--1">Berita</h4>
      </div>
    </div>

    <div class="row row-xs">
      <div class="col-md-12 col-xl-12 mg-t-10">
        <div class="card ">
          <div class="card-body">
            <form action="" method="post" enctype="multipart/form-data">
              {{method_field('PUT') }}
              @csrf
              <div class="form-group">
                <label for="Nama">Judul Berita</label>
                <input type="text" name="judul" value="{{$data->judul}}" class="form-control"
                  placeholder="Judul Berita">
              </div>
              <div class="form-group">
                <label for="Nama">Foto</label>
                <input type="file" name="foto" class="form-control">
              </div>
              <div class="form-group">
                <label for="Nama">isi</label>
                <textarea name="isi" id="isi" name="isi" class="form-control" required>{{$data->isi}}</textarea>
              </div>
              <div class="card-footer text-right">
                <a href="{{route('beritaIndex')}}" type="button" class="btn btn-secondary tx-13"
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