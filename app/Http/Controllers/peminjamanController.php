<?php

namespace App\Http\Controllers;

use App\Fasilitas;
use App\Peminjaman_fasilitas;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class peminjamanController extends Controller
{
    public function index()
    {
        $data = Peminjaman_fasilitas::orderBy('id', 'Desc')->get();
        $peneliti = User::where('role', 4)->where('status', 1)->orderBy('nama', 'Desc')->get();
        $fasilitas = Fasilitas::orderBy('id', 'Desc')->get();
        return view('admin.peminjaman.index', compact('data', 'peneliti', 'fasilitas'));
    }

    public function store(Request $req)
    {
        $data = Peminjaman_fasilitas::create($req->all());
        return redirect()->back()->withSuccess('Data Berhasil Disimpan');
    }

    public function edit($uuid)
    {
        $data = Peminjaman_fasilitas::where('uuid', $uuid)->first();
        $peneliti = User::where('role', 4)->where('status', 1)->orderBy('nama', 'Desc')->get();
        $fasilitas = Fasilitas::orderBy('id', 'Desc')->get();
        return view('admin.peminjaman.edit', compact('data', 'peneliti', 'fasilitas'));
    }

    public function update(Request $req, $uuid)
    {
        $peminjaman = Peminjaman_fasilitas::where('uuid', $uuid)->first();

        $data = $peminjaman->fill($req->all())->save();

        return redirect()->route('peminjamanIndex')->withSuccess('Data Berhasil Diubah');
    }

    public function updateStatus($uuid)
    {
        $data = Peminjaman_fasilitas::where('uuid', $uuid)->first();
        if ($data->status == 0) {
            $status = 1;
        } else {
            $status = 0;
        }

        $data->status = $status;

        $data->update();

        return redirect()->back()->withSuccess('Berhasil Verifikasi');

    }

    public function destroy($uuid)
    {
        $data = Peminjaman_fasilitas::where('uuid', $uuid)->first()->delete();

        return redirect()->back()->withSuccess('Data Berhasil Dihapus');
    }

    public function penelitiIndex()
    {
        $data = Peminjaman_fasilitas::where('peneliti_id', Auth::user()->peneliti->id)->orderBy('id', 'Desc')->get();
        $fasilitas = Fasilitas::orderBy('id', 'Desc')->get();
        return view('peneliti.peminjaman.index', compact('data', 'fasilitas'));
    }

}
