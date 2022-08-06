<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\DataKategori;
use App\Models\DataBuku;

class PagesController extends Controller
{
    public function beranda()
    {
        return view('siswa.beranda.index');
    }

    public function tentang()
    {
        return view('siswa.tentang.index');
    }

    public function profile()
    {
        return view('siswa.profile.index');
    }

    public function katalog(Request $request)
    {
        $kategori   = DataKategori::all();
        $buku       = DataBuku::with('kategori')->orderBy('judul');

        if($request->kategori_id) {
            $buku = $buku->where('data_kategori_id', 'LIKE', '%'.$request->kategori_id.'%');
        } elseif($request->req_judul) {
            $buku = $buku->where('judul', 'LIKE', '%'.$request->req_judul.'%');
        } elseif($request->req_th) {
            $buku = $buku->where('th_terbit', 'LIKE', '%'.$request->req_th.'%');
        }  elseif($request->pengarang) {
            $buku = $buku->where('pengarang', 'LIKE', '%'.$request->pengarang.'%');
        } 
        
        $buku = $buku->paginate(10);
        

        return view('siswa.katalogbuku.index', compact('kategori', 'buku'));
    }

    public function katalogShow($id)
    {
        $buku = DataBuku::with('kategori', 'rak')->find($id);

        return view('siswa.katalogbuku.show', compact('buku'));
    }
}
