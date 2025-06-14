<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalKegiatan extends Model
{
    use HasFactory;

    // Jika nama tabel tidak sesuai konvensi Laravel
    protected $table = 'jadwal_kegiatan';

    // Kolom yang boleh diisi (fillable)
    protected $fillable = [
        'judul',
        'waktu_mulai',
        'waktu_selesai',
        'tanggal',
        'lokasi',
    ];

    // Cast tanggal ke objek Carbon otomatis
    protected $dates = [
        'tanggal',
        'waktu_mulai',
        'waktu_selesai',
    ];
}
