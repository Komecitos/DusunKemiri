<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PerangkatDusun;
use Illuminate\Support\Facades\Storage;
use Spatie\Image\Image;
use Spatie\Image\Manipulations;

class PerangkatDusunController extends Controller
{
    public function index()
    {
        $perangkats = PerangkatDusun::all();
        return view('admin.perangkatdusun.index', compact('perangkats'));
    }

    public function create()
    {
        return view('admin.perangkatdusun.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'nomor_hp' => 'required|string|max:20',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->only(['nama', 'jabatan', 'nomor_hp']);

        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('perangkat', 'public');

            // Optimasi gambar
            $imagePath = storage_path("app/public/{$path}");
            Image::load($imagePath)->optimize()->save();

            $data['foto'] = $path;
        }

        PerangkatDusun::create($data);

        return redirect()->route('admin.perangkat.index')->with('success', 'Data perangkat berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $perangkat = PerangkatDusun::findOrFail($id);
        return view('admin.perangkatdusun.edit', compact('perangkat'));
    }

    public function update(Request $request, $id)
    {
        $perangkat = PerangkatDusun::findOrFail($id);

        $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'nomor_hp' => 'required|string|max:20',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->only(['nama', 'jabatan', 'nomor_hp']);

        if ($request->hasFile('foto')) {
            if ($perangkat->foto && Storage::disk('public')->exists($perangkat->foto)) {
                Storage::disk('public')->delete($perangkat->foto);
            }

            $path = $request->file('foto')->store('perangkat', 'public');

            // Optimasi gambar
            $imagePath = storage_path("app/public/{$path}");
            Image::load($imagePath)->optimize()->save();

            $data['foto'] = $path;
        }

        $perangkat->update($data);

        return redirect()->route('admin.perangkat.index')->with('success', 'Data perangkat berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $perangkat = PerangkatDusun::findOrFail($id);

        if ($perangkat->foto && Storage::disk('public')->exists($perangkat->foto)) {
            Storage::disk('public')->delete($perangkat->foto);
        }

        $perangkat->delete();

        return redirect()->route('admin.perangkat.index')->with('success', 'Data perangkat berhasil dihapus.');
    }
}
