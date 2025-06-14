<?php

namespace App\Http\Controllers\Admin;

use App\Models\JadwalKegiatan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class JadwalController extends Controller
{
    public function index()
    {
        $jadwal = JadwalKegiatan::latest()->paginate(10); // atau all(), terserah kebutuhan
        return view('admin.jadwal.index', compact('jadwal'));
    }
    public function create()
    {
        return view('admin.jadwal.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'lokasi' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'waktu_mulai' => 'required',
            'waktu_selesai' => 'required',
        ]);

        JadwalKegiatan::create($request->all());

        return redirect()->route('admin.jadwal.index')->with('success', 'Jadwal berhasil ditambahkan.');
    }
    public function edit($id)
    {
        $jadwal = JadwalKegiatan::findOrFail($id);
        return view('admin.jadwal.edit', compact('jadwal'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'waktu_mulai' => 'required',
            'waktu_selesai' => 'required',
            'lokasi' => 'required|string|max:255',
            'tanggal' => 'required|date',
        ]);

        $jadwal = JadwalKegiatan::findOrFail($id);
        $jadwal->update($request->all());

        return redirect()->route('admin.jadwal.index')->with('success', 'Jadwal berhasil diperbarui.');
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
