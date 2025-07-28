<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;
use Spatie\ImageOptimizer\OptimizerChainFactory;
use Intervention\Image\ImageManager;
use Illuminate\Support\Str;


class BeritaController extends Controller
{
    public function index(Request $request)
    {
        $query = News::query();

        if ($request->filled('keyword')) {
            $kategori = $request->input('kategori', 'judul'); 

            if ($kategori === 'penulis') {
                $query->where('penulis', 'like', '%' . $request->keyword . '%');
            } elseif ($kategori === 'tanggal') {
                $query->whereDate('created_at', $request->keyword);
            } else {
                $query->where('judul', 'like', '%' . $request->keyword . '%');
            }
        }

        $berita = $query->latest()->paginate(10);

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
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:4096',
            'keterangan_gambar' => 'nullable|string',
            'tanggal' => 'nullable|date',
        ]);

        $data = $request->except('gambar');

        if ($request->hasFile('gambar')) {
            $image = $request->file('gambar');
            $filename = uniqid() . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('berita', $filename, 'public');

            // Optimasi otomatis gambar yang baru diunggah
            $absolutePath = storage_path("app/public/{$path}");
            $optimizerChain = OptimizerChainFactory::create();
            $optimizerChain->optimize($absolutePath);

            $data['gambar'] = $path;
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
