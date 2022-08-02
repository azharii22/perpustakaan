<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KatalogBukuController extends Controller
{
    public function index() 
    {
    return view ('siswa.katalogbuku.index');
    }
}
