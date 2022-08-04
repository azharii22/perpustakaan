<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

use App\Models\Peminjaman;

class PengembalianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax()) {
            $data = Peminjaman::with('user', 'buku')->where('status', 'BERHASIL');

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('user', function ($row) {
                    return $row->user->name;
                })
                ->addColumn('buku', function ($row) {
                    return $row->buku->judul;
                })
                ->addColumn('status', function ($row) {
                    if($row->tanggal_pengembalian_aktual) {
                        return '<span class="badge bg-success">Dikembalikan</span>';
                    } elseif($row->tanggal_pengembalian_aktual < $row->tanggal_pengembalian) {
                        return '<span class="badge bg-danger">Telat</span>';
                    } else {
                        return '<span class="badge bg-warning">Sedang Peminjaman</span>';
                    }
                })
                ->addColumn('action', function ($row) {
                    $edit = '<a href="'.route('admin.data-pengembalian.edit', $row->id).'" class="btn btn-secondary btn-sm">PROSES PENGEMBALIAN</a>';
                    return $edit;
                })
                ->rawColumns(['status', 'action'])
                ->make(true);
        }
        return view('admin.pengembalian.index');
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

        return view('admin.pengembalian.edit', compact('peminjaman'));
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
            'tanggal_pengembalian_aktual' => 'required'
        ]);

        $peminjaman = Peminjaman::find($id);
        $peminjaman->update([
            'tanggal_pengembalian_aktual'  => $request->tanggal_pengembalian_aktual,
        ]);

        return redirect()->route('admin.data-pengembalian.index')->with('success', 'Data Pengembalian berhasil ditambahkan');
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
