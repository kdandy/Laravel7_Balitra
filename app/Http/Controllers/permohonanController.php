<?php

namespace App\Http\Controllers;

use App\Mail\VerifEmail;
use App\Peneliti;
use App\Permohonan;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class permohonanController extends Controller
{
    public function index()
    {
        $data = Permohonan::whereIn('status', [1, 3])->orderBy('status', 'asc')->get();
        return view('admin.permohonan.index', compact('data'));
    }

    public function show($uuid)
    {
        $data = Permohonan::where('uuid', $uuid)->first();
        return view('admin.permohonan.detail', compact('data'));
    }

    public function lampiranPreview($uuid)
    {
        $data = Permohonan::where('uuid', $uuid)->first();
        $pathToFile = base_path() . '/public/lampiran/permohonan/' . $data->lampiran;

        return response()->file($pathToFile);
    }

    public function verifikasiPermohonan(Request $request)
    {
        $data = Permohonan::where('uuid', $request->uuid)->first();
        $data->status = $request->status;
        if ($request->status == 2) {
            $user = User::findOrFail($data->user_id);
            $data->tanggal_pemanggilan = $request->tanggal_pemanggilan;

            $user->status = 1;
            $user->update();

            $peneliti = new Peneliti;
            $peneliti->user_id = $user->id;
            $peneliti->NIK = $data->NIK;
            $peneliti->alamat = $data->alamat;
            $peneliti->no_hp = $data->no_hp;
            $peneliti->tempat_lahir = $data->tempat_lahir;
            $peneliti->tanggal_lahir = $data->tanggal_lahir;
            $peneliti->pendidikan_terakhir = $data->pendidikan_terakhir;
            $data->catatan = null;
            $peneliti->save();
            Mail::to($data->email)->send(new VerifEmail($data));
        } elseif ($request->status == 3) {
            $data->catatan = $request->catatan;
            Mail::to($data->email)->send(new VerifEmail($data));
        } else {
            return redirect()->back()->with('success', 'Tidak Ada Aksi');
        }
        $data->update();

        return redirect()->back()->with('success', 'Data Berhasil Diverifikasi');
    }

    public function filter()
    {
        return view('admin.permohonan.filter');
    }
}
