@extends('layouts.main')
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
            <li class="breadcrumb-item"><a href="#">Berita</a></li>
            <li class="breadcrumb-item active" aria-current="page">Berita </li>
          </ol>
        </nav>
        <h4 class="mg-b-0 tx-spacing--1">Berita </h4>
      </div>
      <div class="d-none d-md-block">
        <a class="btn btn-sm pd-x-15 btn-dark btn-uppercase mg-l-5" href="#modal2" data-toggle="modal"><i
            data-feather="plus" class="wd-10 mg-r-5"></i> Tambah Data</a>
      </div>
    </div>
    <div class="row row-xs">
      <div class="col-md-12 col-xl-12 mg-t-10">
        <div class="card card-body ">
          <div data-label="Example" class="df-example demo-table">
            <table id="dataTable" class="table text-center">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Judul</th>
                  <th>Foto</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody> 
                @foreach($data as $d)
                <tr>
                  <td>{{$loop->iteration}}</td>
                  <td>{{$d->judul}}</td> 
                  <td> <img src="{{asset('images/berita/'. $d->foto)}}" class="rounded-circle" alt="" width="40" height="40"></td>
                  <td>
                    <a href="{{Route('beritaEdit',['uuid' => $d->uuid])}}" class="btn btn-primary btn-icon">
                      <i data-feather="edit"></i>
                    </a>
                    <button type="button" class="btn btn-danger btn-icon"  onclick="Hapus('{{$d->uuid}}','{{$d->judul}}')">
                      <i data-feather="delete"></i>
                    </button>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div><!-- df-example -->
        </div>
      </div>
    </div><!-- row -->
  </div><!-- container -->
</div>

<!-- modal -->
<div class="modal fade bd-example-modal-lg" id="modal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2"
  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content tx-14">
      <div class="modal-header">
        <h6 class="modal-title" id="exampleModalLabel2">Tambah Data</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{Route('beritaStore')}}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label for="Nama">Judul Berita</label>
            <input type="text" name="judul" class="form-control" placeholder="Judul Berita" required>
          </div>
          <div class="form-group">
            <label for="Nama">Foto</label>
            <input type="file" name="foto" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="Nama">Isi</label>
            <textarea name="isi" id="isi" name="isi" class="form-control" required></textarea>
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
</div>
@endsection
@section('scripts')
<script src="{{asset('admin/lib/summernote/summernote.min.js')}}"></script>
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

    $(document).ready(function() {
        $('#isi').summernote();
    });

      function Hapus(uuid, judul) {
        Swal.fire({
        title: 'Anda Yakin?',
        text: " Menghapus Data Berita " + judul ,        
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Hapus',
        cancelButtonText: 'Batal'
      }).then((result) => {
        if (result.value) {
          url = '{{route("beritaDestroy",'')}}';
          window.location.href =  url+'/'+uuid ;
        }
      })
        }
</script>
@endsection