<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class News extends Model
{
    use HasFactory;

    protected $fillable = ['judul', 'isi', 'penulis', 'created_at', 'updated_at', 'gambar', 'keterangan_gambar', 'tanggal'];

    protected static function booted()
    {
        static::saving(function ($berita) {
            // Jika slug belum ada atau judul berubah, buat ulang slug
            if (!$berita->slug || $berita->isDirty('judul')) {
                $berita->slug = Str::slug($berita->judul);

                // Pastikan slug unik (misalnya: judul-sama, judul-sama-1, judul-sama-2)
                $originalSlug = $berita->slug;
                $counter = 1;

                while (News::where('slug', $berita->slug)
                    ->where('id', '!=', $berita->id ?? 0)
                    ->exists()
                ) {
                    $berita->slug = $originalSlug . '-' . $counter++;
                }
            }
        });
    }
}
