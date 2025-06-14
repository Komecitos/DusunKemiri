<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\PetaDusun;

use Illuminate\Http\Request;

class PetaDusunController extends Controller
{
    public function index()
    {
        $lokasi = PetaDusun::all();
        return view('peta.index', compact('lokasi'));
    }
}
