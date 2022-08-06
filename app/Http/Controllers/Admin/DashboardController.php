<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\DataBuku;
use App\Models\Peminjaman;
use App\Models\DataKategori;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $totalAnggota       = User::user()->count();
        $totalBukuTersedia  = DataBuku::sum('jumlah');
        $totalBukuDipinjam  = Peminjaman::dipinjam()->count();
        $totalKoleksiBuku   = $totalBukuTersedia+$totalBukuDipinjam;
        $totalPeminjamanTerlambat = Peminjaman::dipinjam()->diperpanjang()->terlambat()->count();
        //
        $aktifitasaPeminjaman = Peminjaman::orderByDesc('created_at')->get()->take(5);
        //
        $kategori   = DataKategori::query();
        $labels     = $kategori->pluck('name');
        $peminjaman = $kategori->withCount(['bukuPeminjaman', 'bukuPeminjaman as buku_peminjaman_count' => function ($q) {
            $q->where('status', 'DIPINJAM')->orwhere('status', 'DIPERPANJANG');
        }])->pluck('buku_peminjaman_count')->toArray();
        $datasets = [$labels, $peminjaman];

        return view('admin.dashboard', compact('totalAnggota', 'totalBukuTersedia', 'totalBukuDipinjam', 'totalKoleksiBuku', 'totalPeminjamanTerlambat', 'aktifitasaPeminjaman', 'labels', 'datasets'));
    }
}
