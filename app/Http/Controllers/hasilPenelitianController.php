<?php

namespace App\Http\Controllers;

use App\Hasil_penelitian;
use App\Hasil_penilaian;
use App\Penelitian;
use App\Penilaian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class hasilPenelitianController extends Controller
{

    public function index()
    {
        $data = Penelitian::all();
        return view('admin.hasilPenelitian.index', compact('data'));
    }

    public function penelitiIndex()
    {

        $peneliti_id = Auth::user()->peneliti->id;
        $data = Penelitian::where('peneliti_id', $peneliti_id)->first();
        return view('peneliti.hasilPenelitian.index', compact('data'));
    }

    public function pejabatIndex()
    {

        $data = Penelitian::all();
        return view('pejabat.hasilPenelitian.index', compact('data'));
    }

    //peneliti store
    public function store(Request $req)
    {
        $data = Hasil_penelitian::create($req->all());
        if ($req->file != null) {
            $img = $req->file('file');
            $FotoExt = $img->getClientOriginalExtension();
            $FotoName = $data->id;
            $file = $FotoName . '.' . $FotoExt;
            $img->move('lampiran/hasilPenelitian', $file);
            $data->file = $file;
        }
        $data->update();

        return back()->withSuccess('Data Berhasil Disimpan');

    }

    public function penelitiEdit($uuid)
    {
        $data = Hasil_penelitian::where('uuid', $uuid)->first();
        return view('peneliti.hasilPenelitian.edit', compact('data'));
    }

    public function penelitiUpdate(Request $req, $uuid)
    {
        $data = Hasil_penelitian::where('uuid', $uuid)->first();
        $data->fill($req->all())->save();
        if ($req->file != null) {
            $img = $req->file('file');
            $FotoExt = $img->getClientOriginalExtension();
            $FotoName = $data->id;
            $file = $FotoName . '.' . $FotoExt;
            $img->move('lampiran/hasilPenelitian', $file);
            $data->file = $file;
        } else {
            $data->file = $data->file;
        }
        $data->update();

        return redirect()->route('penelitiLaporanPenelitian')->withSuccess('Data Berhasil Diubah');
    }

    public function pembimbingIndex()
    {
        $data = Penelitian::all();
        return view('pembimbing.hasilPenelitian.index', compact('data'));
    }

    public function pembimbingDetail($uuid)
    {
        $data = Penelitian::where('uuid', $uuid)->first();
        return view('pembimbing.hasilPenelitian.show', compact('data'));
    }

    public function inputPenilaian($uuid)
    {
        $penelitian = Penelitian::where('uuid', $uuid)->first();
        $data = Penilaian::latest()->get();
        return view('pembimbing.Penilaian.index', compact('penelitian', 'data'));
    }

    public function penilaianStore(Request $req)
    {
        $data = new Hasil_penilaian;
        $data->penelitian_id = $req->penelitian_id;
        $data->penilaian_id = $req->id;
        $data->nilai = $req->nilai;
        $data->save();

        return back()->withSuccess('Data Berhasil Disimpan');
    }

    public function HasilPeneltianStatusUpdate(Request $request)
    {
        $data = Hasil_penelitian::findOrFail($request->uuid)->first();
        if ($request->status == 1 || $request->status == 0) {
            $data->status = $request->status;
            $data->catatan = null;
        } else {
            $data->status = $request->status;
            $data->catatan = $request->catatan;
        }

        $data->update();

        return redirect()->back()->withSuccess('Status Berhasil Diubah');

    }

    public function resetNilai($uuid)
    {
        $data = Hasil_penilaian::where('uuid', $uuid)->first()->delete();
        return redirect()->back()->withSuccess('Nilai Berhasil di Reset');
    }
}
