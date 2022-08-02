<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SirkulasiController extends Controller
{
    public function index() 
    {
    return view ('siswa.sirkulasi.index');
    }
}
