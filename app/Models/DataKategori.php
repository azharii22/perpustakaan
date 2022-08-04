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
}
