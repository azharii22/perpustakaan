<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataBuku extends Model
{
    use HasFactory;
    protected $table = "data_bukus";
    protected $fillable = [
        'judul',
        'jb',
        'pengarang',
        'penerbit',
        'th_terbit',
        'deskripsi',
        'slug',
        'gambar'
    ];
}
