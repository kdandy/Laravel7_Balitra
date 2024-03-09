<?php

namespace App\Http\Controllers;

use App\Data_personal;
use App\User;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PejabatController extends Controller
{
    public function index()
    {
        $data = User::OrderBy('id', 'Desc')->where('role', 3)->get();

        return view('admin.pejabat.index', compact('data'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|unique:users',
            'NIP' => 'required|unique:data_personals',
        ]);

        if ($validator->fails()) {
            return back()->with('warning', 'Username/NIP Sudah Digunakan');
        }

        $user = new User;
        $user->nama = $request->nama;
        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        if ($request->foto != null) {
            $img = $request->file('foto');
            $FotoExt = $img->getClientOriginalExtension();
            $FotoName = $request->nama;
            $foto = $FotoName . '.' . $FotoExt;
            $img->move('images/pejabat', $foto);
            $user->foto = $foto;
        } else {
            $user->foto = 'default.png';
        }
        $user->role = 3;
        $user->save();

        $personal = new Data_personal;
        $personal->user_id = $user->id;
        $personal->NIP = $request->NIP;
        $personal->jabatan = $request->jabatan;
        $personal->no_hp = $request->no_hp;
        $personal->tempat_lahir = $request->tempat_lahir;
        $personal->tanggal_lahir = $request->tanggal_lahir;
        $personal->alamat = $request->alamat;
        $personal->save();

        return redirect()->route('pejabatIndex')->with('success', 'Berhasil Menyimpan Data');
    }

    public function edit($uuid)
    {
        $data = User::where('uuid', $uuid)->first();
        return view('admin.pejabat.edit', compact('data'));
    }

    public function update(Request $request, $uuid)
    {
        $user = user::where('uuid', $uuid)->first();

        $user->nama = $request->nama;
        $user->username = $request->username;
        if (isset($request->password)) {
            $user->password = Hash::make($request->password);
        } else {
            $user->password = $user->password;
        }
        if ($request->foto != null) {
            $img = $request->file('foto');
            $FotoExt = $img->getClientOriginalExtension();
            $FotoName = $request->nama;
            $foto = $FotoName . '.' . $FotoExt;
            $img->move('images/pejabat', $foto);
            $user->foto = $foto;
        } else {
            $user->foto = $user->foto;
        }

        $user->update();

        $personal = Data_personal::where('user_id', $user->id)->first();

        $personal->user_id = $user->id;
        $personal->NIP = $request->NIP;
        $personal->jabatan = $request->jabatan;
        $personal->no_hp = $request->no_hp;
        $personal->tempat_lahir = $request->tempat_lahir;
        $personal->tanggal_lahir = $request->tanggal_lahir;
        $personal->alamat = $request->alamat;

        $personal->update();

        return redirect()->route('pejabatIndex')->with('success', 'Berhasil Mengubah Data');

    }

    public function destroy($uuid)
    {
        $user = User::where('uuid', $uuid)->first()->delete();

        return redirect()->route('pejabatIndex')->with('success', 'Berhasil Menghapus Data');

    }
}
