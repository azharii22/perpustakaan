<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DataAnggotaController extends Controller
{
    public function index() 
    {
    return view ('admin.dataanggota.index');
    }
}
