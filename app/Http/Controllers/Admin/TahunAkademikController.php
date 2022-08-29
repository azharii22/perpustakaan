<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

use App\Models\TahunAkademik;

class TahunAkademikController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax()) {
            $data = TahunAkademik::query();

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('status', function ($row) {
                    if($row->status) {
                        return '<span class="badge bg-success">Aktif</span>';
                    } else {
                        return '<span class="badge bg-secondary">Non-Aktif</span>';
                    }
                })
                ->addColumn('action', function ($row) {
                    $edit = '<a href="'.route('admin.tahun-akademik.edit', $row->id).'" class="btn btn-secondary btn-sm">EDIT</a>'; 
                    if(!$row->status) {
                        $delete = '<a href="javascript:void(0)" onclick="destroy('.$row->id.')" class="btn btn-success btn-sm mx-2">Aktifkan</a>';
                    } else {
                        $delete = '<a href="javascript:void(0)" onclick="destroy('.$row->id.')" class="btn btn-danger btn-sm mx-2">Non-Aktifkan</a>';
                    };

                    return $edit.$delete;
                })
                ->rawColumns(['status', 'action'])
                ->make();
        }

        return view('admin.tahun-akademik.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tahun-akademik.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        TahunAkademik::create([
            'ta'    => $request->ta,
            'status'=> $request->status
        ]);

        return redirect()->route('admin.tahun-akademik.index')->with('success', 'Data Tahun Akademik berhasil ditambahkan');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tahun = TahunAkademik::find($id);

        return view('admin.tahun-akademik.edit', compact('tahun'));
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
        $tahun = TahunAkademik::find($id);
        $tahun->update([
            'ta'    => $request->ta,
            'status'=> $request->status
        ]);

        return redirect()->route('admin.tahun-akademik.index')->with('success', 'Data Tahun Akademik berhasil diperbaharui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tahun = TahunAkademik::find($id);
        if($tahun->status) {
            $tahun->update([
                'status' => 0,
            ]);
        } else {
            $tahun->update([
                'status' => 1,
            ]);
        }

        return response()->json([
            'message' => 'success'
        ]);
    }
}
