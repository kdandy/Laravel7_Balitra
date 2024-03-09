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
        td {}
        br {
            margin-bottom: 5px !important;
        }
        .judul {
            text-align: center;
        }
        .header {
            margin-bottom: 0px;
            text-align: center;
            height: 100px;
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
            <table>
                <tr>
                    <td width="70%"></td>
                    <td><p>Banjarbaru, {{$tgl}}</p></td>
                </tr>
            </table>
            <p>Perihal : Peminjaman Fasilitas Penelitian</p>
            <br>
            <p>Kepada Yth. <br>
            Kepala BALITTRA  <br>
            di Tempat
    </p>
            <br>
            <p> Dengan Hormat, <br>
            Dengan ini saya selaku yang melakukan penelitian.</p>
            <table>
                <tr>
                    <td width="23%">Nama</td>
                    <td>: {{$data->peneliti->user->nama}}</td>
                </tr>
                <tr>
                    <td>NIK</td>
                    <td>:{{$data->peneliti->NIK}}</td>
                </tr>
            </table>
            <p>Bermaksud untuk meminjam fasilitas BALITTRA guna melancarkan kegiatan penelitian yang akan saya lakukan berikut adalah detail peminjaman :</p>
            <table>
                <tr>
                    <td width="23%">Fasilitas</td>
                    <td>: {{$data->fasilitas->nama}}</td>
                </tr>
                <tr>
                    <td>Maksud Peminjaman</td>
                    <td>: {{$data->tujuan_peminjaman}}</td>
                </tr>
                <tr>
                    <td>Durasi Peminjaman</td>
                    <td>: {{carbon\carbon::parse($data->tanggal_mulai)->translatedFormat('d F Y')}} -
                    {{carbon\carbon::parse($data->tanggal_selesai)->translatedFormat('d F Y')}}</td>
                </tr>
            </table>
            <p>Dengan ini saya bertanggung jawab apabila ada kerusakan terhadap fasilitas yang digunakan,demikian permohonan dari saya atas perhatiannya saya ucapkan terimakasih</p>
            <br>
            <br>
            <br>
            <table>
                <tr>
                    <td style="text-align:center"> <h5>
                    </h5>
                    <br>
                    <h5>PEMOHON</h5>
                    <br>
                    <br>
                    <h5 style="text-decoration:underline;">{{$data->peneliti->user->nama}}</h5></td>
                    <td style="text-align:center">
                        <h5>
                            <p>Banjarbaru, {{$tgl}}</p>
                        </h5>
                        <h5>Kepala BALITTRA</h5>
                        <br>
                        <br>
                        <h5 style="text-decoration:underline;">{{$pejabat->nama}}</h5>
                        <h5>NIP.{{$pejabat->data_personal->NIP}}</h5>
                        </td>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</body>
</html>