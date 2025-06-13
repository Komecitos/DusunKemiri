<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Warga;

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
            'nik' => 'required|string|max:20',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:L,P', // ENUM
            'pekerjaan' => 'required|string|max:100',
            'pendidikan_terakhir' => 'required|string|max:100',
            'alamat' => 'required|string',
            'dusun' => 'required|string|max:100',
            'rt_rw' => 'required|string|max:20',
            'rt' => 'required|in:01,02',
            'rw' => 'required|in:01,02,03',
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
            'nama' => 'required',
            'no_kk' => 'required',
            'nik' => 'required',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:L,P',
            'pekerjaan' => 'required',
            'pendidikan_terakhir' => 'required',
            'alamat' => 'required',
            'dusun' => 'required',
            'rt_rw' => 'required',
            'rt' => 'required|in:01,02',
            'rw' => 'required|in:01,02,03',
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
}
