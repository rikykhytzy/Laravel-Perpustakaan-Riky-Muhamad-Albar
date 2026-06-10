<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    // Mengunci nama tabel agar Laravel membaca 'kategori' (tanpa huruf S)
    protected $table = 'kategori'; 

    protected $fillable = ['nama_kategori'];
}