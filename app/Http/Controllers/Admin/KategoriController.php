<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

use App\Models\DataKategori;
use App\Http\Requests\Admin\KategoriRequest;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax()) {
            $data = DataKategori::withTrashed();

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('status', function ($row) {
                    if (!$row->trashed()) {
                        return 'Aktif';
                    } else {
                        return 'Non-Aktif';
                    }
                })
                ->addColumn('action', function ($row) {
                    $edit = '<a href="'.route('admin.data-kategori.edit', $row->id).'" class="btn btn-secondary btn-sm">EDIT</a>'; 
                    if($row->trashed()) {
                        $delete = '<a href="javascript:void(0)" onclick="destroy('.$row->id.')" class="btn btn-success btn-sm mx-2">Aktifkan</a>';
                    } else {
                        $delete = '<a href="javascript:void(0)" onclick="destroy('.$row->id.')" class="btn btn-danger btn-sm mx-2">Non-Aktifkan</a>';
                    }
                    return $edit.$delete;
                })
                ->rawColumns(['status', 'action'])
                ->make();
        }
        return view('admin.data-kategori.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.data-kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KategoriRequest $request)
    {
        DataKategori::create($request->validated());

        return redirect()->route('admin.data-kategori.index')->with('success', 'Data Kategori berhasil ditambahkan');
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
        $kategori = DataKategori::withTrashed()->find($id);

        return view('admin.data-kategori.edit', compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(KategoriRequest $request, $id)
    {
        $kategori = DataKategori::withTrashed()->find($id);
        $kategori->update($request->validated());

        return redirect()->route('admin.data-kategori.index')->with('success', 'Data Kategori berhasil diperbaharui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kategori = DataKategori::withTrashed()->find($id);
        if($kategori->trashed()) {
            $kategori->restore();
        } else {
            $kategori->delete();
        }

        return response()->json([
            'message' => 'success'
        ]);
    }
}
