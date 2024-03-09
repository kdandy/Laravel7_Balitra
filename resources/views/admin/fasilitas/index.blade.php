@extends('layouts.main')

@section('content')
<div class="content-body">
  <div class="container pd-x-0">
    <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
      <div>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb breadcrumb-style1 mg-b-10">
            <li class="breadcrumb-item"><a href="#">Fasilitas</a></li>
            <li class="breadcrumb-item active" aria-current="page">Fasilitas Penelitian</li>
          </ol>
        </nav>
        <h4 class="mg-b-0 tx-spacing--1">Fasilitas Penelitian</h4>
      </div>
      <div class="d-none d-md-block">
        <a href="{{Route('analisisFasilitasCetak')}}" class="btn btn-sm pd-x-15 btn-white btn-uppercase mg-l-5" target="_blank"><i data-feather="printer"
            class="wd-10 mg-r-5"></i>Analisis Cetak</a>
        <a href="{{Route('fasilitasCetak')}}" class="btn btn-sm pd-x-15 btn-white btn-uppercase mg-l-5" target="_blank"><i data-feather="printer"
            class="wd-10 mg-r-5"></i> Cetak</a>
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
                  <th>Nama</th>
                  <th>Kategori</th>
                  <th>Jumlah</th>
                  <th>Keterangan</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach($data as $d)
                <tr>
                  <td>{{$loop->iteration}}</td>
                  <td>{{$d->nama}}</td>
                  <td>{{$d->kategori}}</td>
                  <td>{{$d->jumlah}} {{$d->satuan}}</td>
                  <td>{{$d->keterangan}}</td>
                  <td>
                    <a href="{{Route('fasilitasEdit',['uuid'=>$d->uuid])}}" class="btn btn-primary btn-icon">
                      <i data-feather="edit"></i>
                    </a>
                    <button type="button" class="btn btn-danger btn-icon"  onclick="Hapus('{{$d->uuid}}','{{$d->nama}}')">
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
<div class="modal fade" id="modal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content tx-14">
      <div class="modal-header">
        <h6 class="modal-title" id="exampleModalLabel2">Tambah Data Fasilitas</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{Route('fasilitasStore')}}" method="POST">
          @csrf
          <div class="form-group">
            <label for="Nama">Nama Alat</label>
            <input type="text" name="nama" class="form-control" placeholder="Nama" required>
          </div>
          <div class="form-group">
            <label for="Nama">Kategori</label>
            <select name="kategori" id="" class="form-control" required>
              <option value="">-- Pilih Kategori --</option>
              <option value="Bangunan">Bangunan</option>
              <option value="Peralatan Kebun">Peralatan Kebun</option>
              <option value="Lahan">Lahan</option>
            </select>
          </div>
          <div class="form-group">
            <label for="Nama">Jumlah</label>
            <input type="number" name="jumlah" class="form-control" placeholder="Jumlah" required>
          </div>
          <div class="form-group">
            <label for="Nama">Satuan</label>
            <input type="text" name="satuan" class="form-control" placeholder="Satuan" required>
          </div>
          <div class="form-group">
            <label for="Nama">Keterangan</label>
            <textarea name="keterangan" id="keterangan" name="keterangan" class="form-control" required></textarea>
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

      function Hapus(uuid, nama) {
        Swal.fire({
        title: 'Anda Yakin?',
        text: " Menghapus Data Fasilitas " + nama ,        
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Hapus',
        cancelButtonText: 'Batal'
      }).then((result) => {
        if (result.value) {
          url = '{{route("fasilitasDestroy",'')}}';
          window.location.href =  url+'/'+uuid ;
        }
      })
        }
</script>
@endsection