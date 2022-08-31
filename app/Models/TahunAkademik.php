<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

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
               self::where('status', 1)->update(['status' => 0]);

               $users = User::user()->get();
                foreach($users as $user) {
                    if($user->kelas === '9') {
                        $user->update(['kelas' => 'LULUS']);
                        $user->delete();
                    } else {
                        $user->increment('kelas', 1);
                    }
                }
            }
        });

        self::updating(function ($model) {
            if($model->status) {
               self::where('status', 1)->update(['status' => 0]);

               $users = User::user()->get();
               foreach($users as $user) {
                   if($user->kelas === '9') {
                       $user->update(['kelas' => 'LULUS']);
                       $user->delete();
                   } else {
                       $user->increment('kelas', 1);
                   }
               }
            }
        });
    }
}
