<?php

namespace App\Http\Controllers;

use App\Peneliti;
use App\Penelitian;
use App\Permohonan;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class penelitiController extends Controller
{
    public function index()
    {
        $data = Peneliti::orderBy('id', 'desc')->get();
        $permohonan = Permohonan::where('status', 2)->orderBy('id', 'desc')->get();
        return view('admin.peneliti.index', compact('data', 'permohonan'));
    }

    public function pejabatIndex()
    {
        $data = Peneliti::orderBy('id', 'desc')->get();
        $permohonan = Permohonan::where('status', 2)->orderBy('id', 'desc')->get();
        return view('pejabat.peneliti.index', compact('data', 'permohonan'));
    }

    public function store(Request $request)
    {
        $permohonan = Permohonan::findOrFail($request->permohonan_id);

        $user = new User;
        $user->nama = $permohonan->nama;
        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        $user->role = 4;
        $user->save();
        if ($request->foto != null) {
            $img = $request->file('foto');
            $FotoExt = $img->getClientOriginalExtension();
            $FotoName = $user->id;
            $foto = $FotoName . '.' . $FotoExt;
            $img->move('images/user', $foto);
            $user->foto = $foto;
        } else {
            $user->foto = 'default.png';
        }
        $user->update();

        $data = new Peneliti;
        $data->user_id = $user->id;
        $data->NIK = $permohonan->NIK;
        $data->alamat = $permohonan->alamat;
        $data->no_hp = $permohonan->no_hp;
        $data->tempat_lahir = $permohonan->tempat_lahir;
        $data->tanggal_lahir = $permohonan->tanggal_lahir;
        $data->pendidikan_terakhir = $permohonan->pendidikan_terakhir;

        $data->save();

        return redirect()->back()->with('success', 'Data Berhasil Disimpan');
    }

    public function detail()
    {
        return view('admin.peneliti.detail');
    }

    public function show($uuid)
    {
        $data = Peneliti::where('uuid', $uuid)->first();
        return view('admin.peneliti.detail', compact('data'));
    }

    public function edit($uuid)
    {
        $data = Peneliti::where('uuid', $uuid)->first();
        return view('admin.peneliti.edit', compact('data'));
    }

    public function update(Request $request, $uuid)
    {
        $data = Peneliti::where('uuid', $uuid)->first();
        $data->NIK = $request->NIK;
        $data->alamat = $request->alamat;
        $data->no_hp = $request->no_hp;
        $data->tempat_lahir = $request->tempat_lahir;
        $data->tanggal_lahir = $request->tanggal_lahir;
        $data->pendidikan_terakhir = $request->pendidikan_terakhir;

        $data->update();
        $user = User::findOrFail($data->user_id);
        $user->nama = $request->nama;
        $user->update();

        if ($request->username != null || $request->password != null) {

            if (isset($request->username)) {
                $user->username = $request->username;
            }

            if (isset($request->password)) {
                $user->password = Hash::make($request->password);
            }

            $user->update();
        }

        return redirect()->route('penelitiIndex')->with('success', 'Data Berhasil Diubah');
    }

    public function destroy($uuid)
    {
        $data = Peneliti::where('uuid', $uuid)->first();
        $user = User::findOrFail($data->user_id)->delete();

        return redirect()->back()->with('success', 'Data Berhasil Dihapus');
    }

    public function pembimbingPenelitiIndex()
    {
        $user_id = Auth::id();
        $data = Penelitian::with('peneliti')->where('user_id', $user_id)->get();
        return view('pembimbing.peneliti.index', compact('data'));
    }
}
