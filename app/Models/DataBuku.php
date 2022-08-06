<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class DataBuku extends Model
{
    use SoftDeletes;

    protected $table = "data_bukus";
    protected $fillable = [
        'data_kategori_id',
        'data_rak_id',
        'kode_buku',
        'judul',
        'slug',
        'jumlah',
        'pengarang',
        'penerbit',
        'th_terbit',
        'deskripsi',
        'gambar'
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $slug   = Str::slug($model->judul);
            $count  = static::whereRaw("slug RLIKE '^{$slug}(-[0-9]+)?$'")->count();
            $kategoriCount = static::where('data_kategori_id', $model->data_kategori_id)->count();
            //
            $model->kode_buku   = substr($model->kategori->name, 0, 1).str_pad($kategoriCount+1, 3, '0', STR_PAD_LEFT).strtoupper(Str::random(3));
            $model->slug        = $count ? "{$slug}-{$count}" : $slug;
        });
    }

    public function scopeAvailable($query)
    {
        $query->where('jumlah', '>=', 0);
    }

    public function kategori()
    {
        return $this->belongsTo(DataKategori::class, 'data_kategori_id')->withTrashed();
    }

    public function rak()
    {
        return $this->belongsTo(DataRak::class, 'data_rak_id')->withTrashed();
    }

    public function peminjaman()
    {
        return $this->hasMany(Peminjaman::class, 'data_buku_id');
    }
}
