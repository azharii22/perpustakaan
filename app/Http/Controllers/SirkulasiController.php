<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

use App\Models\Peminjaman;

class SirkulasiController extends Controller
{
    public function peminjaman(Request $request)
    {
        if($request->ajax()) {
            $data = Peminjaman::with('user', 'buku')->orderByDesc('created_at')->where('user_id', auth()->user()->id);

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('user', function ($row) {
                    return $row->user->name;
                })
                ->addColumn('buku', function ($row) {
                    return $row->buku->judul;
                })
                ->addColumn('kode_buku', function ($row) {
                    return $row->buku->kode_buku;
                })
                ->addColumn('tanggal_diambil', function ($row) {
                    return $row->tanggal_diambil->format('d/m/Y');
                })
                ->addColumn('tanggal_pengambilan', function ($row) {
                    if($row->tanggal_pengambilan) {
                        return $row->tanggal_pengambilan->format('d/m/Y');
                    }
                })
                ->addColumn('tanggal_pengembalian', function ($row) {
                    if($row->tanggal_pengembalian) {
                        return $row->tanggal_pengembalian->format('d/m/Y');
                    }
                })
                ->addColumn('tanggal_pengembalian_aktual', function ($row) {
                    if($row->tanggal_pengembalian_aktual) {
                        if($row->tanggal_pengembalian_aktual > $row->tanggal_pengembalian || $row->tanggal_pengembalian < \Carbon\Carbon::now()) {
                            return $row->tanggal_pengembalian_aktual->format('d/m/Y').'<span class="badge bg-danger mx-4">TELAT</span>';    
                        } else {
                            return $row->tanggal_pengembalian_aktual->format('d/m/Y');
                        }
                    }
                    
                })
                ->addColumn('status', function ($row) {
                    return '<span class="badge bg-dark">'.$row->status.'</span>';
                })
                ->addColumn('action', function ($row) {
                    if($row->status === 'BARU') {
                        return $edit = '<a href="'.route('admin.data-peminjaman.edit', $row->id).'" class="btn btn-warning btn-sm text-white">PROSES PEMINJAMAN</a>'; ;
                    } elseif($row->status === 'DIPINJAM' || $row->status === 'DIPERPANJANG') {
                        $edit       = '<a href="'.route('admin.data-pengembalian.edit', $row->id).'" class="btn btn-info btn-sm text-white">PROSES PENGEMBALIAN</a>';
                        $perpanjang = '<a href="'.route('admin.data-perpanjangan.edit', $row->id).'" class="btn btn-primary btn-sm text-white mb-2">PROSES PERPANJANGAN</a>';
                        return $perpanjang.$edit;
                    }
                })
                ->rawColumns(['tanggal_pengembalian_aktual', 'status'])
                ->make(true);
        }
        return view('siswa.sirkulasi.peminjaman');
    }

    public function pengembalian(Request $request)
    {
        if($request->ajax()) {
            $data = Peminjaman::with('user', 'buku')->orderByDesc('created_at')->where('user_id', auth()->user()->id)->dikembalikan();

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('user', function ($row) {
                    return $row->user->name;
                })
                ->addColumn('buku', function ($row) {
                    return $row->buku->judul;
                })
                ->addColumn('kode_buku', function ($row) {
                    return $row->buku->kode_buku;
                })
                ->addColumn('tanggal_diambil', function ($row) {
                    return $row->tanggal_diambil->format('d/m/Y');
                })
                ->addColumn('tanggal_pengambilan', function ($row) {
                    if($row->tanggal_pengambilan) {
                        return $row->tanggal_pengambilan->format('d/m/Y');
                    }
                })
                ->addColumn('tanggal_pengembalian', function ($row) {
                    if($row->tanggal_pengembalian) {
                        return $row->tanggal_pengembalian->format('d/m/Y');
                    }
                })
                ->addColumn('tanggal_pengembalian_aktual', function ($row) {
                    if($row->tanggal_pengembalian_aktual) {
                        if($row->tanggal_pengembalian_aktual > $row->tanggal_pengembalian || $row->tanggal_pengembalian < \Carbon\Carbon::now()) {
                            return $row->tanggal_pengembalian_aktual->format('d/m/Y').'<span class="badge bg-danger mx-4">TELAT</span>';    
                        } else {
                            return $row->tanggal_pengembalian_aktual->format('d/m/Y');
                        }
                    }
                    
                })
                ->addColumn('status', function ($row) {
                    return '<span class="badge bg-dark">'.$row->status.'</span>';
                })
                ->addColumn('action', function ($row) {
                    if($row->status === 'BARU') {
                        return $edit = '<a href="'.route('admin.data-peminjaman.edit', $row->id).'" class="btn btn-warning btn-sm text-white">PROSES PEMINJAMAN</a>'; ;
                    } elseif($row->status === 'DIPINJAM' || $row->status === 'DIPERPANJANG') {
                        $edit       = '<a href="'.route('admin.data-pengembalian.edit', $row->id).'" class="btn btn-info btn-sm text-white">PROSES PENGEMBALIAN</a>';
                        $perpanjang = '<a href="'.route('admin.data-perpanjangan.edit', $row->id).'" class="btn btn-primary btn-sm text-white mb-2">PROSES PERPANJANGAN</a>';
                        return $perpanjang.$edit;
                    }
                })
                ->rawColumns(['tanggal_pengembalian_aktual', 'status'])
                ->make(true);
        }
        return view('siswa.sirkulasi.pengembalian');
    }
}
