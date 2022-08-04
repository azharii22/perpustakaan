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

            $model->slug = $count ? "{$slug}-{$count}" : $slug;
        });
    }

    public function kategori()
    {
        return $this->belongsTo(DataKategori::class, 'data_kategori_id')->withTrashed();
    }

    public function rak()
    {
        return $this->belongsTo(DataRak::class, 'data_rak_id')->withTrashed();
    }
}
