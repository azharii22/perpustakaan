<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    protected $table = 'peminjamans';
    protected $fillable = [
        'user_id',
        'data_buku_id',
        'tanggal_diambil',
        'tanggal_pengambilan',
        'tanggal_pengembalian',
        'tanggal_pengembalian_aktual',
        'status',
    ];
    protected $dates = [
        'tanggal_diambil',
        'tanggal_pengambilan',
        'tanggal_pengembalian',
        'tanggal_pengembalian_aktual',
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            // FORMAT KODE PEMINJAMAN : USER_ID/CREATED_AT/000x
            $user_id    = auth()->user()->id;
            $date       = \Carbon\Carbon::now()->format('dmy');
            $lastID     = $model->whereDate('created_at', \Carbon\Carbon::today())->orderByDesc('created_at')->count();

            $model->kode_peminjaman = 'PJM/'.$date.'/'.$user_id.'/000'.str_pad($lastID+1, 3);
        });
    }

    public function scopeAvailable($query)
    {
        $query->where('jumlah', '>=', 0);
    }

    public function scopeBaru($query)
    {
        $query->where('status', 'BARU');
    }

    public function scopeDipinjam($query)
    {
        $query->orwhere('status', 'DIPINJAM');
    }

    public function scopeDiperpanjang($query)
    {
        $query->orwhere('status', 'DIPERPANJANG');
    }

    public function scopeDikembalikan($query)
    {
        $query->where('status', 'DIKEMBALIKAN');
    }

    public function scopeTerlambat($query)
    {
        $query->where('tanggal_pengembalian', '<', \Carbon\Carbon::now());
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function buku()
    {
        return $this->belongsTo(DataBuku::class, 'data_buku_id');
    }
}
