<?php

namespace App\Http\Controllers;

use App\Fasilitas;
use Illuminate\Http\Request;

class fasilitasController extends Controller
{
    public function index()
    {
        $data = Fasilitas::orderBy('id', 'Desc')->get();

        return view('admin.fasilitas.index', compact('data'));
    }

    public function pejabatIndex()
    {
        $data = Fasilitas::orderBy('id', 'Desc')->get();

        return view('pejabat.fasilitas.index', compact('data'));
    }

    public function store(Request $request)
    {
        $data = new Fasilitas;
        $data->nama = $request->nama;
        $data->kategori = $request->kategori;
        $data->jumlah = $request->jumlah;
        $data->satuan = $request->satuan;
        $data->keterangan = $request->keterangan;
        $data->save();

        return redirect()->route('fasilitasIndex')->with('success', 'Data Berhasil Disimpan');
    }

    public function edit($uuid)
    {
        $data = Fasilitas::where('uuid', $uuid)->first();

        return view('admin.fasilitas.edit',compact('data'));
    }

    public function update(Request $request,$uuid)
    {
        $data = Fasilitas::where('uuid', $uuid)->first();
        $data->nama = $request->nama;
        $data->kategori = $request->kategori;
        $data->jumlah = $request->jumlah;
        $data->satuan = $request->satuan;
        $data->keterangan = $request->keterangan;

        $data->update();

        return redirect()->route('fasilitasIndex')->with('success', 'Data Berhasil Diubah');
    }

    public function destroy($uuid)
    {
        $data = Fasilitas::where('uuid', $uuid)->first()->delete();

        return redirect()->route('fasilitasIndex')->with('success', 'Data Berhasil Dihapus');
    }
}
