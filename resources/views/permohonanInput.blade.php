@extends('layouts.depan')

@section('content')
<section id="cta2">
    <div class="container">
        <div class="text-center">
            <img class="img-responsive wow fadeIn" src="{{asset('depan/images/cta2/cta2-img.png')}}" alt=""
                data-wow-duration="300ms" data-wow-delay="300ms">
        </div>
    </div>
</section>
<section class="">
    <div class="container" style="padding-left:100px;padding-right:100px;">
        <div class="">
            <h2 class="text-center">Input Permohonan Penelitian</h2>
            <br>
            <form action="{{Route('permohonanStore')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="">Nama Lengkap</label>
                    <input type="text" name="nama" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">NIK</label>
                    <input type="text" name="NIK" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" name="email" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">Alamat</label>
                    <textarea name="alamat" name="alamat" id="" class="form-control" required></textarea>
                </div>
                <div class="form-group">
                    <label for="">No Telepon</label>
                    <input type="text" name="no_hp" class="form-control" required>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Tempat Lahir</label>
                            <input type="text" name="tempat_lahir" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir" class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Pendidikan Terakhir</label>
                    <select name="pendidikan_terakhir" id="" class="form-control" required>
                        <option value="">-- Pilih Pendidikan Terakhir --</option>
                        <option value="SD">SD</option>
                        <option value="SMP">SMP</option>
                        <option value="SMA/SMK">SMA/SMK</option>
                        <option value="D1">D1</option>
                        <option value="D2">D2</option>
                        <option value="D3">D3</option>
                        <option value="D4">D4</option>
                        <option value="S1">S1</option>
                        <option value="S2">S2</option>
                        <option value="S3">S3</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Objek Penelitian</label>
                    <select name="objek_penelitian_id" id="objek_penelitian_id" class="form-control" required>
                        <option value="">--Pilih Objek Penelitian--</option>
                        @foreach($objekPenelitian as $o)
                        <option value="{{$o->id}}">{{$o->nama}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Keperluan</label>
                    <textarea name="keperluan" id="" class="form-control" required></textarea>
                </div>
                <div class="form-group">
                    <label for="">Lampiran File (Surat Pengantar dll)</label>
                    <input type="file" name="lampiran" class="form-control">
                </div>
                <div class="text-right">
                    <button type="submit" class="btn btn-primary">Kirim Permohonan</button>
                </div>
            </form>
        </div>
    </div>
</section>
<br><br>
@endsection