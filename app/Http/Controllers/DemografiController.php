<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Warga;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;



class DemografiController extends Controller
{
    public function index()
    {
        $wargas = Warga::all();

        // Hitung usia dari data warga
        $anak = $wargas->where('usia', '<', 18)->count();
        $dewasa = $wargas->where('usia', '>=', 18)->where('usia', '<', 60)->count();
        $lanjutUsia = $wargas->where('usia', '>=', 60)->count();

        return view('demografi.index', [
            'wargas' => $wargas,
            'anak' => $anak,
            'dewasa' => $dewasa,
            'lanjutUsia' => $lanjutUsia
        ]);
    }
}
