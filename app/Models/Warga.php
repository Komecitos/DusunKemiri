<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warga extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'nik',
        'jenis_kelamin',
        'alamat',
        'dusun',
        'agama',
        'tanggal_lahir',
        'pekerjaan',
    ];
}
