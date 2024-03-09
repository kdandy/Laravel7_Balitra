<?php

namespace App\Http\Controllers;

use App\Objek_penelitian;
use Illuminate\Http\Request;

class objekPenelitianController extends Controller
{
    public function index()
    {
        $data = Objek_penelitian::orderBy('id', 'Desc')->get();

        return view('admin.objekPenelitian.index', compact('data'));
    }

    public function store(Request $request)
    {
        $data = new Objek_penelitian;
        $data->nama = $request->nama;
        $data->uraian = $request->uraian;
        $data->save();

        return redirect()->route('objekPenelitianIndex')->with('success', 'Data Berhasil Disimpan');
    }

    public function edit($uuid)
    {
        $data = Objek_penelitian::where('uuid', $uuid)->first();

        return view('admin.objekPenelitian.edit', compact('data'));
    }

    public function update(Request $request, $uuid)
    {
        $data = Objek_penelitian::where('uuid', $uuid)->first();
        $data->nama = $request->nama;
        $data->uraian = $request->uraian;
        $data->update();

        return redirect()->route('objekPenelitianIndex')->with('success', 'Data Berhasil Diubah');
    }

    public function destroy($uuid)
    {
        $data = Objek_penelitian::where('uuid', $uuid)->first()->delete();

        return redirect()->route('objekPenelitianIndex')->with('success', 'Data Berhasil Dihapus');
    }

}
