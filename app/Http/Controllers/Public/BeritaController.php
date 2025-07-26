<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function index(Request $request)
    {
        $query = News::query();

        if ($request->filled('cari')) {
            $query->where(function ($q) use ($request) {
                $q->where('judul', 'like', '%' . $request->cari . '%')
                    ->orWhere('isi', 'like', '%' . $request->cari . '%');
            });
        }

        if ($request->filled('tanggal')) {
            $query->whereDate('tanggal', $request->tanggal);
        }

        $berita = $query->latest()->paginate(6);

        return view('news.index', compact('berita'));
    }



    public function latest()
    {
        $berita_terbaru = News::latest()->take(6)->get();
        return view('home', compact('berita_terbaru'));
    }

    public function show($slug)
    {
        $berita = News::where('slug', $slug)->firstOrFail();

        $berita_lain = News::where('id', '!=', $berita->id)
            ->latest()
            ->take(5)
            ->get();

        return view('news.show', compact('berita', 'berita_lain'));
    }
}
