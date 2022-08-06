<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

use App\Models\Peminjaman;

class PerpanjanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax()) {
            $data = Peminjaman::with('user', 'buku')->diperpanjang();

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('user', function ($row) {
                    return $row->user->name;
                })
                ->addColumn('buku', function ($row) {
                    return $row->buku->judul;
                })
                ->addColumn('tanggal_diambil', function ($row) {
                    return $row->tanggal_diambil->format('d/m/Y');
                })
                ->addColumn('tanggal_pengambilan', function ($row) {
                    return $row->tanggal_pengambilan->format('d/m/Y');
                })
                ->addColumn('tanggal_pengembalian', function ($row) {
                    return $row->tanggal_pengembalian->format('d/m/Y');
                })
                ->addColumn('tanggal_pengembalian_aktual', function ($row) {
                    if($row->tanggal_pengembalian_aktual > $row->tanggal_pengembalian || $row->tanggal_pengembalian < \Carbon\Carbon::now()) {
                        return $row->tanggal_pengembalian_aktual->format('d/m/Y').'<span class="badge bg-danger mx-4">TELAT</span>';    
                    } else {
                        return $row->tanggal_pengembalian_aktual->format('d/m/Y');
                    }
                    
                })
                ->addColumn('status', function ($row) {
                    return '<span class="badge bg-dark">'.$row->status.'</span>';
                })
                ->addColumn('action', function ($row) {
                    if($row->status === 'BERHASIL' || $row->status === 'TOLAK') {
                        $edit = '';
                    } else {
                        $edit = '<a href="'.route('admin.data-peminjaman.edit', $row->id).'" class="btn btn-secondary btn-sm">PENGAMBILAN</a>'; 
                    }
                    return $edit;
                })
                ->rawColumns(['status', 'action'])
                ->make(true);
        }
        return view('admin.perpanjangan.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $peminjaman = Peminjaman::with('buku', 'user')->find($id);

        return view('admin.perpanjangan.edit', compact('peminjaman'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $peminjaman = Peminjaman::with('buku')->find($id);
        $peminjaman->update([
            'tanggal_pengembalian'  => \Carbon\Carbon::parse($request->tanggal_pengembalian),
            'status'                => 'DIPERPANJANG'
        ]);

        return redirect()->route('admin.data-peminjaman.index')->with('success', 'Data Perpanjang Peminjaman berhasil diproses');
    }
}
