<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PengembalianBukuController extends Controller
{
    public function index() 
    {
    return view ('siswa.pengembalianbuku.index');
    }
}
