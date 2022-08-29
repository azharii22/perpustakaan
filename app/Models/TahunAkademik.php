<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TahunAkademik extends Model
{
    protected $table = 'tahun_akademik';
    protected $fillable = [
        'ta',
        'status'
    ];
    
    public static function boot()
    {
        parent::boot();

        self::creating(function ($model) {
            if($model->status) {
                $otherModel = self::where('status', 1)->update(['status' => 0]);
            }
        });

        self::updating(function ($model) {
            if($model->status) {
                $otherModel = self::where('status', 1)->update(['status' => 0]);
            }
        });
    }
}
