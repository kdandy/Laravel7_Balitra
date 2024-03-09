@extends('layouts.main')

@section('content')
<div class="content-body">
  <div class="container pd-x-0">
    <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
      <div>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb breadcrumb-style1 mg-b-10">
            <li class="breadcrumb-item"><a href="#">Permohonan</a></li>
            <li class="breadcrumb-item active" aria-current="page">Filter</li>
          </ol>
        </nav>
        <h4 class="mg-b-0 tx-spacing--1">Filter Cetak </h4>
      </div>
    </div>

    <div class="row row-xs">
      <div class="col-md-12 col-xl-12 mg-t-10">
        <div class="card">
          <div class="card-body">
            <form action="" method="post">
              @csrf
              <div class="form-group">
                <label for="">Pilih Status</label>
                <select name="status" id="status" class="form-control">
                    <option value=""> -- Pilih Status --</option>
                    <option value="2">Disetujui</option>
                    <option value="1">Pending</option>
                    <option value="3">Ditolak</option>

                </select>
              </div>
          </div>
          <div class="card-footer text-right">
            <button type="button" class="btn btn-secondary tx-13" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary tx-13"><i data-feather="save" class="wd-10 mg-r-5"></i>
              Cetak</button>
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
</script>
@endsection