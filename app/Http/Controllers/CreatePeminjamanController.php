<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\DataBuku;

class CreatePeminjamanController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, $id)
    {
        $buku = DataBuku::with('kategori')->find($id);

        return view('siswa.peminjaman.create', compact('buku'));
    }
}
