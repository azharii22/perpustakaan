<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

use App\Models\Peminjaman;

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
            $data = Peminjaman::with('user', 'buku');

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('user', function ($row) {
                    return $row->user->name;
                })
                ->addColumn('buku', function ($row) {
                    return $row->buku->judul;
                })
                ->addColumn('status', function ($row) {
                    if($row->status === 'BERHASIL') {
                        return '<span class="badge bg-success">'.$row->status.'</span>';
                    } elseif($row->status === 'TOLAK') {
                        return '<span class="badge bg-danger">'.$row->status.'</span>';
                    } else {
                        return '<span class="badge bg-dark">'.$row->status.'</span>';
                    }
                })
                ->addColumn('action', function ($row) {
                    if($row->status === 'BERHASIL' || $row->status === 'TOLAK') {
                        $edit = '';
                        $delete = '';
                    } else {
                        $edit = '<a href="'.route('admin.data-peminjaman.edit', $row->id).'" class="btn btn-success btn-sm">PROSES</a>'; 
                        $delete = '<a href="javascript:void(0)" onclick="destroy('.$row->id.')" class="btn btn-danger btn-sm mx-2">TOLAK</a>';
                    }
                    return $edit.$delete;
                })
                ->rawColumns(['status', 'action'])
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
            'status'                => 'BERHASIL',
            'tanggal_pengambilan'   => \Carbon\Carbon::now(),
            'tanggal_pengembalian'  => \Carbon\Carbon::now()->addDays(7),
        ]);

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
