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
        $umurGroups = [
            '0-4' => [0, 4],
            '5-9' => [5, 9],
            '10-14' => [10, 14],
            '15-19' => [15, 19],
            '20-24' => [20, 24],
            '25-29' => [25, 29],
            '30-34' => [30, 34],
            '35-39' => [35, 39],
            '40-44' => [40, 44],
            '45-49' => [45, 49],
            '50-54' => [50, 54],
            '55-59' => [55, 59],
            '60+'  => [60, 150],
        ];

        $data = [];

        foreach ($umurGroups as $label => [$min, $max]) {
            $countL = Warga::where('jenis_kelamin', 'L')
                ->whereBetween('tanggal_lahir', [
                    Carbon::now()->subYears($max + 1),
                    Carbon::now()->subYears($min)
                ])->count();

            $countP = Warga::where('jenis_kelamin', 'P')
                ->whereBetween('tanggal_lahir', [
                    Carbon::now()->subYears($max + 1),
                    Carbon::now()->subYears($min)
                ])->count();

            $data[] = [
                'usia' => $label,
                'laki' => -$countL, // negatif untuk kiri
                'perempuan' => $countP,
            ];
        }

        // return view('demografi.index', compact('data'));

        $pendidikan = \App\Models\Warga::selectRaw('pendidikan_terakhir, COUNT(*) as jumlah')
            ->groupBy('pendidikan_terakhir')
            ->orderBy('jumlah', 'desc')
            ->get();

        return view('demografi.index', compact('pendidikan', 'data')); // $data = data piramida
    }
}
