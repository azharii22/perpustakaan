<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PeminjamanBukuController extends Controller
{
    public function index() 
    {
    return view ('siswa.peminjamanbuku.index');
    }
}
