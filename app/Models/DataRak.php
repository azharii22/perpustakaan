<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DataRak extends Model
{
    use SoftDeletes;

    protected $table = 'data_raks';
    protected $fillable = [
        'name',
        'description'
    ];

    public function buku()
    {
        return $this->hasMany(DataBuku::class, 'data_rak_id');
    }
}
