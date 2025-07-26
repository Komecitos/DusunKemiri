<?php

namespace App\Http\Controllers\Public;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\News;


class HomeController extends Controller
{
    public function index()
    {
        $berita_terbaru = News::latest()->take(6)->get();
        return view('home', compact('berita_terbaru'));
    }
}
