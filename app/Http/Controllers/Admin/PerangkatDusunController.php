<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PerangkatDusun;

class PerangkatDusunController extends Controller
{
    public function index()
    {
        $perangkat = PerangkatDusun::all();
        return view('admin.perangkatdusun.index', compact('perangkat'));
    }

    public function create()
    {
        return view('admin.perangkatdusun.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'jabatan' => 'required',
            'nomor_hp' => 'required',
            'email' => 'nullable|email',
            'alamat' => 'nullable',
        ]);

        PerangkatDusun::create($request->all());

        return redirect()->route('admin.perangkat.index')->with('success', 'Data perangkat berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $perangkat = PerangkatDusun::findOrFail($id);
        return view('admin.perangkatdusun.edit', compact('perangkat'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'jabatan' => 'required',
            'nomor_hp' => 'required',
            'email' => 'nullable|email',
            'alamat' => 'nullable',
        ]);

        $perangkat = PerangkatDusun::findOrFail($id);
        $perangkat->update($request->all());

        return redirect()->route('admin.perangkat.index')->with('success', 'Data perangkat berhasil diperbarui.');
    }

    public function destroy($id)
    {
        PerangkatDusun::destroy($id);
        return back()->with('success', 'Data perangkat berhasil dihapus.');
    }
}
