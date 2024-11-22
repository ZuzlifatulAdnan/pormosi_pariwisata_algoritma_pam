<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class berita extends Model
{
    use HasFactory;
    protected $fillable = [
        'kategori_berita_id',
        'judul',
        'deskripsi',
        'image'
    ];

    public function kategori_berita()
    {
        return $this->belongsTo(kategori_berita::class);
    }
}
