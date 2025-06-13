<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warga extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'alamat', 'jenis_kelamin', 'umur', 'no_kk', 'nik', 'tanggal_lahir', 'pekerjaan', 'pendidikan_terakhir', 'dusun', 'rt_rw'];
}
