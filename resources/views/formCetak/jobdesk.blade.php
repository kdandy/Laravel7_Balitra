<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body {}
        table {
            border-collapse: collapse;
            width: 100%;
        }
        table,
        th,
        td {
        }
        th {
            background-color: darkslategray;
            text-align: center;
            color: aliceblue;
        }
        td {height: 30;

        }
        br {
            margin-bottom: 5px !important;
        }
        .judul {
            text-align: center;
        }
        .header {
            margin-bottom: 0px;
            text-align: center;
            height: 150px;
            padding: 0px;
        }
        .pemko {
            width: 100px;
        }
        .logo {
            float: left;
            margin-right: 0px;
            width: 15%;
            padding: 0px;
            text-align: right;
        }
        .headtext {
            float: right;
            margin-left: 0px;
            width: 75%;
            padding-left: 0px;
            padding-right: 10%;
        }
        hr {
            margin-top: 10%;
            height: 3px;
            background-color: black;
        }
        .ttd {
            margin-left: 70%;
            text-align: center;
            text-transform: uppercase;
        }
        .text-center{
            text-align:center;
        }
    </style>
</head>

<body>
    <div class="header">
        <div class="logo">
            <img class="pemko" src="depan/images/logo.png">
        </div>
        <div class="headtext">
            <h3 style="margin:0px;">BALAI PENELITIAN PERTANIAN LAHAN RAWA</h3>
            <p style="margin:0px;">Alamat : Jl.Kebun Karet,Loktabat Utara,Kotak Pos 31,Banjarbaru 70712,Kalimantan Selatan. Telepon :(0511) 4772534, 4773034</p>
        </div>
        <hr>
    </div>

    <div class="container">
        <div class="isi">
            <h2 style="text-align:center;margin:0px;padding:0px;">KEGIATAN PENELITIAN</h2>
            <br>
            <table>
                <tr>
                    <td width="25%">Nama Peneliti</td>
                    <td>:{{$data->peneliti->user->nama}}</td>
                </tr>
                <tr>
                    <td>NIK</td>
                    <td>:{{$data->peneliti->NIK}}</td>
                </tr>
                <tr>
                    <td>Pembimbing</td>
                    <td>: {{$data->user->nama}}</td>
                </tr>
               
            </table>
            <br>
            <table class="table text-center" style="border:1px solid black">
              <thead>
                <tr style="border:1px solid black">
                  <th style="border:1px solid black">No</th>
                  <th style="border:1px solid black">Tanggal</th>
                  <th style="border:1px solid black">Uraian Kegiatan</th>
                  <th style="border:1px solid black">Tanggal Upload Laporan</th>
                  <th style="border:1px solid black">Status</th>
                </tr>
              </thead>
              <tbody>
                @foreach($data->jobdesk as $d)
                <tr style="border:1px solid black">
                  <td style="border:1px solid black">{{$loop->iteration}}</td>
                  <td style="border:1px solid black">{{carbon\carbon::parse($d->created_at)->translatedFormat('d F Y')}}</td>
                  <td style="border:1px solid black">{{$d->uraian}}</td>
                  <td style="border:1px solid black">{{carbon\carbon::parse($d->jobdesk_peneliti->created_at)->translatedFormat('d F Y')}}</td>
                  <td style="border:1px solid black">@if($d->status == 0 ) Belum di Verifikasi @elseif($d->status == 1) Telah di Verifikasi
                    @else Revisi @endif</td>
                </tr>
                @endforeach
              </tbody>
            </table>
            <br>
            <div class="ttd">
                <h5>
                    <p>Banjarbaru, {{$tgl}}</p>
                </h5>
                <h5>Kepala BALITTRA</h5>
                <br>
                <br>
                <h5 style="text-decoration:underline;">{{$pejabat->nama}}</h5>
                <h5>NIP.{{$pejabat->data_personal->NIP}}</h5>
            </div>
        </div>
    </div>
</body>
</html>