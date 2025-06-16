<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\ProfilDusun;
use Illuminate\Http\Request;
use App\Models\PerangkatDusun;

class ProfilDusunController extends Controller
{
    public function index()
    {
        $profil = ProfilDusun::first();
        $perangkat = PerangkatDusun::orderBy('jabatan')->get();
        return view('profil.index', compact('profil', 'perangkat'));
    }

    public function edit()
    {
        $profil = ProfilDusun::first();
        return view('admin.profil.edit', compact('profil'));
    }

    public function update(Request $request)
    {
        $profil = ProfilDusun::first();

        $profil->update([
            'sejarah' => $request->sejarah,
            'visi' => $request->visi,
            'misi' => $request->misi,
            'letak_geografis' => $request->letak_geografis,
            'kondisi_sosial_budaya' => $request->kondisi_sosial_budaya,
            'struktur_organisasi' => $request->struktur_organisasi,
            'potensi_dusun' => $request->potensi_dusun,
        ]);

        return redirect()->back()->with('success', 'Profil berhasil diperbarui.');
    }
}
