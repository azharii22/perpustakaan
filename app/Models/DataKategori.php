<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DataKategori extends Model
{
    use SoftDeletes;

    protected $table = 'data_kategoris';
    protected $fillable = [
        'name',
        'description'
    ];

    public function buku()
    {
        return $this->hasMany(DataBuku::class, 'data_kategori_id');
    }

    public function bukuPeminjaman()
    {
        return $this->hasManyThrough(Peminjaman::class, DataBuku::class);
    }
}
