<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PetaDusun extends Model
{
    use HasFactory;

    protected $table = 'petadusun';
    protected $fillable = [
        'nama',
        'latitude',
        'longitude',
        'keterangan'
    ];
}
