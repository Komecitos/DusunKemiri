<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class BeritaController extends Controller
{
    public function index()
    {
        $beritas = News::all();
        return view('admin.berita.index', compact('beritas'));
    }

    public function edit($id)
    {
        $berita = News::findOrFail($id);
        return view('admin.berita.edit', compact('berita'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required',
            'isi' => 'required',
        ]);

        $berita = News::findOrFail($id);
        $berita->update($request->all());

        return redirect()->route('admin.berita')->with('success', 'Berita berhasil diperbarui.');
    }
}
