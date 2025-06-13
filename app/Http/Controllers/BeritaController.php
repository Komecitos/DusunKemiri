<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class BeritaController extends Controller
{
    public function index(Request $request)
    {
        $query = News::query();

        if ($request->has('keyword')) {
            $query->where('judul', 'LIKE', '%' . $request->keyword . '%');
        }

        $berita = $query->orderBy('created_at', 'desc')->paginate(10);

        return view('admin.news.index', compact('berita'));
    }

    public function create()
    {
        return view('admin.news.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required',
            'penulis' => 'nullable|string|max:100',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'keterangan_gambar' => 'nullable|string',
            'tanggal' => 'nullable|date',
        ]);

        $data = $request->all();

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('berita', 'public');
        }

        News::create($data);

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil ditambahkan.');
    }


    public function edit($id)
    {
        $berita = News::findOrFail($id);
        return view('admin.news.edit', compact('berita'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required',
            'penulis' => 'nullable|string|max:100',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'keterangan_gambar' => 'nullable|string',
            'tanggal' => 'nullable|date',
        ]);

        $berita = News::findOrFail($id);
        $data = $request->all();

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('berita', 'public');
        }

        $berita->update($data);

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil diperbarui.');
    }


    public function destroy($id)
    {
        $berita = News::findOrFail($id);
        $berita->delete();

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil dihapus.');
    }
}
