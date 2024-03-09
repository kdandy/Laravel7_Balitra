<?php

namespace App\Http\Controllers;

use App\Penilaian;
use Illuminate\Http\Request;

class formPenilaianController extends Controller
{
    public function index()
    {
        $data = Penilaian::latest()->get();
        return view('admin.formPenilaian.index', compact('data'));
    }

    public function store(Request $req)
    {
        $data = Penilaian::create($req->all());
        return redirect()->route('formPenilaianIndex')->with('success', 'Data Berhasil Disimpan');
    }

    public function edit($uuid)
    {
        $data = Penilaian::where('uuid', $uuid)->first();
        return view('admin.formPenilaian.edit', compact('data'));
    }

    public function update(Request $req, $uuid)
    {
        $data = Penilaian::where('uuid', $uuid)->first();
        $data->fill($req->all())->save();

        return redirect()->route('formPenilaianIndex')->with('success', 'Data Berhasil Diubah');
    }

    public function destroy($uuid)
    {
        $data = Penilaian::where('uuid', $uuid)->first()->delete();

        return redirect()->back()->with('success', 'Data Berhasil Dihapus');
    }
}
