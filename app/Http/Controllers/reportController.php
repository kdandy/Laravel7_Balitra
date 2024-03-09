<?php

namespace App\Http\Controllers;

use App\Objek_penelitian;
use App\Fasilitas;
use App\Hasil_penelitian;
use App\Hasil_penilaian;
use App\Peminjaman_fasilitas;
use App\Peneliti;
use App\Permohonan;
use App\Penelitian;
use App\Penilaian;
use App\User;
use PDF;
use Carbon\Carbon;
use Illuminate\Http\Request;

class reportController extends Controller
{
    public function objekPenelitianCetak()
    {
        $data         = Objek_penelitian::all();
        $pejabat      = User::where('role',3)->first();
        $tgl= Carbon::now()->format('d-m-Y');
        $pdf          = PDF::loadView('formCetak.dataObjekPenelitian', ['data'=>$data,'tgl'=>$tgl,'pejabat'=>$pejabat]);
        $pdf->setPaper('a4', 'portrait');

        return $pdf->stream('Laporan Data Penelitian.pdf');
    }

    public function analisisObjekPenelitianCetak()
    {
        $data         = Objek_penelitian::all();
        $pejabat      = User::where('role',3)->first();
        $tgl= Carbon::now()->format('d-m-Y');
        $pdf          = PDF::loadView('formCetak.analisisObjekPenelitian', ['data'=>$data,'tgl'=>$tgl,'pejabat'=>$pejabat]);
        $pdf->setPaper('a4', 'portrait');

        return $pdf->stream('Laporan Data Analisis Objek Penelitian.pdf');
    }

    public function fasilitasCetak()
    {
        $data         = Fasilitas::all();
        $pejabat      = User::where('role',3)->first();
        $tgl= Carbon::now()->format('d-m-Y');
        $pdf          = PDF::loadView('formCetak.dataFasilitas', ['data'=>$data,'tgl'=>$tgl,'pejabat'=>$pejabat]);
        $pdf->setPaper('a4', 'portrait');

        return $pdf->stream('Laporan Data Penelitian.pdf');
    }

    public function analisisFasilitasCetak()
    {
        $data         = Fasilitas::all();
        $pejabat      = User::where('role',3)->first();
        $tgl= Carbon::now()->format('d-m-Y');
        $pdf          = PDF::loadView('formCetak.analisisFasilitas', ['data'=>$data,'tgl'=>$tgl,'pejabat'=>$pejabat]);
        $pdf->setPaper('a4', 'portrait');

        return $pdf->stream('Laporan Data Analisis Peminjaman Fasilitas.pdf');
    }

    public function permohonanCetak()
    {
        $data = Permohonan::whereIn('status', [1, 3])->orderBy('status', 'asc')->get();
        $tgl= Carbon::now()->format('d-m-Y');
        $pejabat      = User::where('role',3)->first();
        $pdf          = PDF::loadView('formCetak.dataPermohonan', ['data'=>$data,'tgl'=>$tgl,'pejabat'=>$pejabat]);
        $pdf->setPaper('a4', 'portrait');

        return $pdf->stream('Laporan Data Penelitian.pdf');
    }

    public function permohonanfilter(Request $request)
    {
        $data = Permohonan::where('status',$request->status)->orderBy('id', 'asc')->get();
        if($data->isEmpty()){
            return redirect()->route('permohonanFilter')->with('warning', 'Data tidak ada');
        }else{
        $tgl= Carbon::now()->format('d-m-Y');
        $pejabat      = User::where('role',3)->first();
        $pdf          = PDF::loadView('formCetak.dataPermohonanFilter', ['data'=>$data,'tgl'=>$tgl,'pejabat'=>$pejabat]);
        $pdf->setPaper('a4', 'portrait');
        return $pdf->stream('Laporan Data Penelitian.pdf');
        }
    }

    public function pembimbingCetakBiodata($uuid)
    {
        $data         = User::OrderBy('id', 'Desc')->where('uuid', $uuid)->first();
        $tgl          = Carbon::now()->format('d-m-Y');
        $pejabat      = User::where('role',3)->first();
        $pdf          = PDF::loadView('formCetak.bioadataPembimbing', ['data'=>$data,'tgl'=>$tgl,'pejabat'=>$pejabat]);
        $pdf->setPaper('a4', 'portrait');
        return $pdf->stream('Laporan Data Penelitian.pdf');
    }

    public function penelitianCetak()
    {
        $data = Penelitian::all();
        $tgl= Carbon::now()->format('d-m-Y');
        $pejabat      = User::where('role',3)->first();
        $pdf          = PDF::loadView('formCetak.dataPenelitian', ['data'=>$data,'tgl'=>$tgl,'pejabat'=>$pejabat]);
        $pdf->setPaper('a4', 'portrait');

        return $pdf->stream('Laporan Data Penelitian.pdf');
    }


    public function skPenelitian($uuid)
    {
        $data = Penelitian::where('uuid',$uuid)->first();
        $tgl= Carbon::now()->format('d-m-Y');
        $pejabat      = User::where('role',3)->first();
        $pdf          = PDF::loadView('formCetak.skPenelitian', ['data'=>$data,'tgl'=>$tgl,'pejabat'=>$pejabat]);
        $pdf->setPaper('a4', 'portrait');

        return $pdf->stream('Laporan Data Penelitian.pdf');
    }

    public function penelitiCetak()
    {
        $data = Peneliti::all();
        $tgl= Carbon::now()->format('d-m-Y');
        $pejabat      = User::where('role',3)->first();
        $pdf          = PDF::loadView('formCetak.dataPeneliti', ['data'=>$data,'tgl'=>$tgl,'pejabat'=>$pejabat]);
        $pdf->setPaper('a4', 'portrait');

        return $pdf->stream('Laporan Data Penelitian.pdf');
    }

    public function jobdeskCetak($uuid)
    {
        $data = Penelitian::where('uuid', $uuid)->first();
        $tgl= Carbon::now()->format('d-m-Y');
        $pejabat      = User::where('role',3)->first();
        $pdf          = PDF::loadView('formCetak.jobdesk', ['data'=>$data,'tgl'=>$tgl,'pejabat'=>$pejabat]);
        $pdf->setPaper('a4', 'portrait');

        return $pdf->stream('Laporan Kegiatan Penelitian.pdf');
    }

    public function peminjamanCetak()
    {
        $data = Peminjaman_fasilitas::all();
        $tgl= Carbon::now()->format('d-m-Y');
        $pejabat      = User::where('role',3)->first();
        $pdf          = PDF::loadView('formCetak.dataPeminjaman', ['data'=>$data,'tgl'=>$tgl,'pejabat'=>$pejabat]);
        $pdf->setPaper('a4', 'portrait');

        return $pdf->stream('Laporan Data Peminjaman.pdf');
    }

    public function peminjamanSuratCetak($uuid)
    {
        $data = Peminjaman_fasilitas::where('uuid',$uuid)->first();
        $tgl= Carbon::now()->format('d-m-Y');
        $pejabat      = User::where('role',3)->first();
        $pdf          = PDF::loadView('formCetak.suratPeminjaman', ['data'=>$data,'tgl'=>$tgl,'pejabat'=>$pejabat]);
        $pdf->setPaper('a4', 'portrait');

        return $pdf->stream('Laporan Surat Peminjaman.pdf');
    }

    public function pembimbingCetak()
    {
        $data = User::where('role',2)->get(); 
        $tgl  = Carbon::now()->format('d-m-Y');
        $pejabat      = User::where('role',3)->first();
        $pdf          = PDF::loadView('formCetak.dataPembimbing', ['data'=>$data,'tgl'=>$tgl,'pejabat'=>$pejabat]);
        $pdf->setPaper('a4', 'portrait');

        return $pdf->stream('Laporan Data Pembimbing.pdf');
    }

    public function penilaianCetak($uuid)
    {
        $penelitian = Penelitian::where('uuid',$uuid)->first(); 
        $data = Hasil_penilaian::with('penilaian')->where('penelitian_id',$penelitian->id)->get(); 
        $tgl  = Carbon::now()->format('d-m-Y');
        $pejabat      = User::where('role',3)->first();
        $pdf          = PDF::loadView('formCetak.dataPenilaian', ['data'=>$data,'tgl'=>$tgl,'penelitian'=>$penelitian,'pejabat'=>$pejabat]);
        $pdf->setPaper('a4', 'portrait');

        return $pdf->stream('Laporan Data Penilaian.pdf');
    }

    public function biodataPemohon($uuid)
    {
        $data = Permohonan::where('uuid',$uuid)->first(); 
        $tgl  = Carbon::now()->format('d-m-Y');
        $pejabat      = User::where('role',3)->first();
        $pdf          = PDF::loadView('formCetak.biodataPemohon', ['tgl'=>$tgl,'data'=>$data,'pejabat'=>$pejabat]);
        $pdf->setPaper('a4', 'portrait');

        return $pdf->stream('Biodata Pemohon.pdf');
    }

    public function analisisPembimbing()
    {
        $data         = User::where('role',2)->get(); 
        $tgl          = Carbon::now()->format('d-m-Y');
        $pejabat      = User::where('role',3)->first();
        $pdf          = PDF::loadView('formCetak.analisisPembimbing', ['tgl'=>$tgl,'data'=>$data,'pejabat'=>$pejabat]);
        $pdf->setPaper('a4', 'portrait');

        return $pdf->stream('Analisis Pembimbing.pdf');
    }
}
