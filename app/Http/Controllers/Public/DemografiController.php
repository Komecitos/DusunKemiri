<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Warga;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;




class DemografiController extends Controller
{
    public function index()
    {
        $totalPenduduk = Warga::count();
        $jumlahKK = Warga::where('status_KK', 'Kepala Keluarga')->count();
        $totalLaki = Warga::where('jenis_kelamin', 'L')->count();
        $totalPerempuan = Warga::where('jenis_kelamin', 'P')->count();

        // Grafik rt dan rw

        $jumlahPerRt = DB::table('wargas')
            ->select('rt', DB::raw('count(*) as total'))
            ->groupBy('rt')
            ->orderBy('rt')
            ->get();

        $jumlahPerRw = DB::table('wargas')
            ->select('rw', DB::raw('count(*) as total'))
            ->groupBy('rw')
            ->orderBy('rw')
            ->get();

        // Grafik kelompok umur

        $kelompokUmur = collect([
            '0-4',
            '5-9',
            '10-14',
            '15-19',
            '20-24',
            '25-29',
            '30-34',
            '35-39',
            '40-44',
            '45-49',
            '50-54',
            '55-59',
            '60-64',
            '65-69',
            '70-74',
            '75-79',
            '80-84',
            '85+',
        ]);

        $now = Carbon::now();

        $rawWarga = DB::table('wargas')
            ->select('jenis_kelamin', 'tanggal_lahir')
            ->whereNotNull('tanggal_lahir')
            ->get();



        $warga = DB::table('wargas')
            ->select('jenis_kelamin', 'tanggal_lahir')
            ->whereNotNull('tanggal_lahir')
            ->get()
            ->map(function ($item) use ($now) {
                $lahir = Carbon::parse($item->tanggal_lahir);

                $umur = $lahir->diffInYears($now); 
                $kelompok = match (true) {
                    $umur < 5 => '0-4',
                    $umur < 10 => '5-9',
                    $umur < 15 => '10-14',
                    $umur < 20 => '15-19',
                    $umur < 25 => '20-24',
                    $umur < 30 => '25-29',
                    $umur < 35 => '30-34',
                    $umur < 40 => '35-39',
                    $umur < 45 => '40-44',
                    $umur < 50 => '45-49',
                    $umur < 55 => '50-54',
                    $umur < 60 => '55-59',
                    $umur < 65 => '60-64',
                    $umur < 70 => '65-69',
                    $umur < 75 => '70-74',
                    $umur < 80 => '75-79',
                    $umur < 85 => '80-84',
                    default => '85+',
                };


                return [
                    'kelompok' => $kelompok,
                    'jenis_kelamin' => $item->jenis_kelamin,
                ];
            });

        $demografiUmur = $warga->groupBy('kelompok')->map(function ($group) {
            return [
                'laki' => $group->where('jenis_kelamin', 'L')->count(),
                'perempuan' => $group->where('jenis_kelamin', 'P')->count(),
            ];
        });

        $dataPiramida = $kelompokUmur->map(function ($range) use ($demografiUmur) {
            return [
                'usia' => $range,
                'laki' => $demografiUmur[$range]['laki'] ?? 0,
                'perempuan' => $demografiUmur[$range]['perempuan'] ?? 0,
            ];
        })->filter(function ($item) {
            return $item['laki'] > 0 || $item['perempuan'] > 0;
        })->values();


        // Grafik Pekerjaan

        $jumlahPerPekerjaan = DB::table('wargas')
            ->select('pekerjaan', DB::raw('count(*) as total'))
            ->whereNotNull('pekerjaan')
            ->groupBy('pekerjaan')
            ->orderBy('total', 'desc')
            ->get();

        $jumlahPerPendidikan = DB::table('wargas')
            ->select('pendidikan_terakhir', DB::raw('count(*) as total'))
            ->whereNotNull('pendidikan_terakhir')
            ->groupBy('pendidikan_terakhir')
            ->orderBy('total', 'desc')
            ->get();

        $jumlahPerAgama = DB::table('wargas')
            ->select('agama', DB::raw('COUNT(*) as total'))
            ->groupBy('agama')
            ->pluck('total', 'agama');

        return view('demografi.index', compact(
            'totalPenduduk',
            'jumlahKK',
            'totalLaki',
            'totalPerempuan',
            'dataPiramida',
            'jumlahPerRt',
            'jumlahPerRw',
            'jumlahPerPekerjaan',
            'jumlahPerPendidikan',
            'jumlahPerAgama',
        ));
    }
}
