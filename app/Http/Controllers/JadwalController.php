<?php

namespace App\Http\Controllers;

use App\Models\JadwalKegiatan;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    public function index()
    {
        return view('jadwal.index');
    }

    public function getData()
    {
        $events = JadwalKegiatan::all()->map(function ($event) {
            return [
                'title' => $event->judul,
                'start' => $event->tanggal . 'T' . $event->waktu_mulai,
                'end'   => $event->tanggal . 'T' . $event->waktu_selesai,
                'extendedProps' => [
                    'lokasi' => $event->lokasi,
                ]
            ];
        });



        return response()->json($events);
    }

    public function show($id)
    {
        $kegiatan = JadwalKegiatan::findOrFail($id);
        return view('jadwal.show', compact('kegiatan'));
    }
}
