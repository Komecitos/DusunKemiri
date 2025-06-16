<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Support\Str;

class BeritaController extends Controller
{
    public function index()
    {
        $berita = News::latest()->paginate(6);
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
        return view('news.show', compact('berita'));
    }
}
