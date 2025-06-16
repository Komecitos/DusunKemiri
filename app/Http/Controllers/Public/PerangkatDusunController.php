<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PerangkatDusun;


class PerangkatDusunController extends Controller
{
    public function index()
    {
        $perangkat = PerangkatDusun::orderBy('jabatan')->get();
        return view('profil.perangkat', compact('perangkat'));
    }
}
