<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ResetPassword extends Model
{
    protected $table = 'reset_passwords';
    protected $fillable = [
        'user_id',
        'status'
    ];

    public function scopeRequested($query)
    {
        return $query->where('status', 0);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
