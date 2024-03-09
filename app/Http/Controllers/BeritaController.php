<?php

namespace App\Http\Controllers;

use App\Berita;
use File;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function index()
    {
        $data = Berita::orderBy('id', 'Desc')->get();
        return view('admin.berita.index', compact('data'));
    }

    public function store(Request $req)
    {
        $data = Berita::create($req->all());
        if ($req->foto != null) {
            $img = $req->file('foto');
            $FotoExt = $img->getClientOriginalExtension();
            $FotoName = $data->id;
            $foto = $FotoName . '.' . $FotoExt;
            $img->move('images/berita', $foto);
            $data->foto = $foto;
        } else {
            $data->foto = 'default.png';
        }
        $data->update();

        return redirect()->back()->withSuccess('Data Berhasil Disimpan');
    }

    public function edit($uuid)
    {
        $data = Berita::where('uuid', $uuid)->first();
        return view('admin.berita.edit', compact('data'));
    }

    public function update(Request $req, $uuid)
    {
        $berita = Berita::where('uuid', $uuid)->first();

        $data = $berita->fill($req->all())->save();
        if ($req->foto != null) {
            $img = $req->file('foto');
            $FotoExt = $img->getClientOriginalExtension();
            $FotoName = $berita->id;
            $foto = $FotoName . '.' . $FotoExt;
            $img->move('images/berita', $foto);
            $berita->foto = $foto;
        }
        $berita->update();

        return redirect()->route('beritaIndex')->withSuccess('Data Berhasil Diubah');
    }

    public function destroy($uuid)
    {
        $data = Berita::where('uuid', $uuid)->first();
        File::delete('images/berita/' . $data->foto);
        $data->delete();

        return redirect()->back()->withSuccess('Data Berhasil Dihapus');
    }
}
