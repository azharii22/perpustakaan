<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

use App\Models\Peminjaman;
use App\Models\DataBuku;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax()) {
            $data = Peminjaman::with('user', 'buku')->orderByDesc('created_at');

            if($request->has('search') && !is_null($request->get('search')['value'])) {                        
                $data->where('kode_peminjaman', 'LIKE', '%'.$request->get('search')['value'].'%');
                    //->orwhere('buku.kode_buku', 'LIKE', '%'.$request->get('search')['value'].'%');
                    // ->orwhere('pengarang', 'LIKE', '%'.$request->get('search')['value'].'%')
                    // ->orwhere('penerbit', 'LIKE', '%'.$request->get('search')['value'].'%')
                    // ->orwhere('th_terbit', 'LIKE', '%'.$request->get('search')['value'].'%');
            }

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('user', function ($row) {
                    return $row->user->name;
                })
                ->filter(function ($instance) use ($request) {
                    if($request->status) {
                        $instance->where('status', $request->status);
                    }
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
                ->rawColumns(['tanggal_pengembalian_aktual', 'status', 'action'])
                ->make(true);
        }
        return view('admin.peminjaman.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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

        return view('admin.peminjaman.edit', compact('peminjaman'));
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
        $this->validate($request, [
            'tanggal_pengambilan' => 'required'
        ]);

        $peminjaman = Peminjaman::find($id);
        $peminjaman->update([
            'status'                => 'DIPINJAM',
            'tanggal_pengambilan'   => \Carbon\Carbon::now(),
            'tanggal_pengembalian'  => \Carbon\Carbon::now()->addDays(7),
        ]);

        
        $buku = DataBuku::find($peminjaman->data_buku_id);
        $buku->decrement('jumlah', 1);

        return redirect()->route('admin.data-peminjaman.index')->with('success', 'Data Peminjaman berhasil diproses');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
