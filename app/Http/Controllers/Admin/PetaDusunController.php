<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Petadusun;

class PetadusunController extends Controller
{
    public function index()
    {
        $petadusun = Petadusun::all();
        return view('admin.peta.index', compact('petadusun'));
    }

    public function create()
    {
        return view('admin.peta.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'keterangan' => 'nullable|string',
            'kategori' => 'nullable|string',
        ]);

        Petadusun::create($request->all());

        return redirect()->route('admin.petadusun.index')->with('success', 'Marker berhasil ditambahkan');
    }

    public function edit($id)
    {
        $petadusun = Petadusun::findOrFail($id);
        return view('admin.peta.edit', compact('petadusun'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'keterangan' => 'nullable|string'
        ]);

        $petadusun = Petadusun::findOrFail($id);
        $petadusun->update($request->all());

        return redirect()->route('admin.petadusun.index')->with('success', 'Marker berhasil diperbarui');
    }

    public function destroy($id)
    {
        $petadusun = Petadusun::findOrFail($id);
        $petadusun->delete();

        return redirect()->route('admin.petadusun.index')->with('success', 'Marker berhasil dihapus');
    }
}
