<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PemingembalianBukuController extends Controller
{
    public function index() 
    {
    return view ('siswa.pengembalianbuku.index');
    }
}
