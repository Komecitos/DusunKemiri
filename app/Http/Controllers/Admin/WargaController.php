<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Warga;
use Illuminate\Support\Facades\Log;


class WargaController extends Controller
{
    public function index(Request $request)
    {

        $query = \App\Models\Warga::query();

        // Pencarian
        $filter = $request->input('filter', 'nama');
        $search = $request->input('search');
        if ($search) {
            $query->where($filter, 'like', "%$search%");
        }

        // Sortir
        $sort = $request->input('sort', 'nama');
        $direction = $request->input('direction', 'asc');
        if (in_array($sort, ['nama', 'nik','no_kk', 'pekerjaan', 'jenis_kelamin']) && in_array($direction, ['asc', 'desc'])) {
            $query->orderBy($sort, $direction);
        }

        $wargas = $query->paginate(10);



        return view('admin.warga.index', compact('wargas'));
    }


    public function edit($id)
    {
        $warga = Warga::findOrFail($id);
        return view('admin.warga.edit', compact('warga'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'no_kk' => 'required|string|max:20',
            'nik' => 'required|string|max:20nik',
            'status_KK' => 'required',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:L,P',
            'status_perkawinan' => 'required',
            'agama' => 'required',
            'golongan_darah' => 'required',
            'kategori_penduduk' => 'required',
            'telepon' => 'nullable|string|max:20',
            'pekerjaan' => 'required|string|max:50',
            'pendidikan_terakhir' => 'required',
            'rt' => 'required',
            'rw' => 'required',
            'nomor_rumah' => 'nullable|string|max:10',
            'alamat' => 'required|string|max:255',
        ]);



        $warga = Warga::findOrFail($id);
        $warga->update($request->all());

        return redirect()->route('admin.warga')->with('success', 'Data warga berhasil diperbarui.');
    }

    public function create()
    {
        return view('admin.warga.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'no_kk' => 'required|string|max:20',
            'nik' => 'required|string|max:20|unique:wargas,nik',
            'status_KK' => 'required',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:L,P',
            'status_perkawinan' => 'required',
            'agama' => 'required',
            'golongan_darah' => 'required',
            'kategori_penduduk' => 'required',
            'telepon' => 'nullable|string|max:20',
            'pekerjaan' => 'required|string|max:50',
            'pendidikan_terakhir' => 'required',
            'rt' => 'required',
            'rw' => 'required',
            'nomor_rumah' => 'nullable|string|max:10',
            'alamat' => 'required|string|max:255',
        ]);

        Warga::create($request->all());

        return redirect()->route('admin.warga')->with('success', 'Data warga berhasil ditambahkan.');
    }

    public function destroy($id)
    {
        $warga = Warga::findOrFail($id);
        $warga->delete();

        return redirect()->route('admin.warga')->with('success', 'Data warga berhasil dihapus.');
    }

    public function show($id)
    {
        $warga = Warga::findOrFail($id);
        return view('admin.warga.show', compact('warga'));
    }
}
