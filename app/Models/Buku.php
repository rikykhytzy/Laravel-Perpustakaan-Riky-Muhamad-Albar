<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;

    protected $table = 'buku'; // Paksa nama tabel sesuai phpMyAdmin
    public $timestamps = false; // Matikan timestamps jika kolomnya tidak ada

    protected $fillable = ['judul', 'penulis', 'penerbit', 'tahun_terbit', 'isbn', 'stok', 'kategori_id'];

    // Relasi ke Kategori
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }
}