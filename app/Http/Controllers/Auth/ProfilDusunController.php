<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProfilDusun;

class ProfilDusunController extends Controller
{
    public function index()
    {
        $profil = \App\Models\ProfilDusun::first(); 
        return view('admin.profil.index', compact('profil'));
    }
    public function edit()
    {
        $profil = ProfilDusun::first();
        return view('admin.profil.edit', compact('profil'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'sejarah' => 'nullable|string',
            'visi' => 'nullable|string',
            'misi' => 'nullable|string',
            'letak_geografis' => 'nullable|string',
            'kondisi_sosial_budaya' => 'nullable|string',
            'potensi_dusun' => 'nullable|string',
        ]);

        $profil = ProfilDusun::first();
        $profil->update($request->only([
            'sejarah',
            'visi',
            'misi',
            'letak_geografis',
            'kondisi_sosial_budaya',
            'potensi_dusun'
        ]));

        return redirect()->route('admin.profil.edit')->with('success', 'Data profil berhasil diperbarui.');
    }
}
