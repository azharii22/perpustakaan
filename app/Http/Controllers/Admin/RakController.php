<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

use App\Models\DataRak;
use App\Http\Requests\Admin\KategoriRequest;
use App\Models\DataKategori;

class RakController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax()) {
            $data = DataRak::withTrashed();

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
                    $list = '<a href="'.route('admin.data-rak.show', $row->id).'" class="btn btn-info btn-sm btn-block col-12 mb-2 text-white">Detail</a><br>';
                    $edit = '<a href="'.route('admin.data-rak.edit', $row->id).'" class="btn btn-secondary btn-sm">EDIT</a>'; 
                    if($row->trashed()) {
                        $delete = '<a href="javascript:void(0)" onclick="destroy('.$row->id.')" class="btn btn-success btn-sm mx-2">Aktifkan</a>';
                    } else {
                        $delete = '<a href="javascript:void(0)" onclick="destroy('.$row->id.')" class="btn btn-danger btn-sm mx-2">Non-Aktifkan</a>';
                    }
                    return $list.$edit.$delete;
                })
                ->make();
        }
        return view('admin.data-rak.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.data-rak.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KategoriRequest $request)
    {
        DataRak::create($request->validated());

        return redirect()->route('admin.data-rak.index')->with('success', 'Data Rak berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rak = DataRak::withTrashed()->with('buku')->find($id);
        $kategori = DataKategori::whereHas('buku', function ($q) use ($id) {
            $q->where('data_rak_id', $id);
        })->get();

        return view('admin.data-rak.show', compact('rak', 'kategori'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rak = DataRak::withTrashed()->find($id);

        return view('admin.data-rak.edit', compact('rak'));
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
        $rak = DataRak::withTrashed()->find($id);
        $rak->update($request->validated());

        return redirect()->route('admin.data-rak.index')->with('success', 'Data Rak berhasil ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rak = DataRak::withTrashed()->find($id);
        if($rak->trashed()) {
            $rak->restore();
        } else {
            $rak->delete();
        }

        return response()->json([
            'message' => 'success'
        ]);
    }
}
