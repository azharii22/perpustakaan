<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Auth;
use Yajra\DataTables\DataTables;

use App\Models\DataBuku;
use App\Models\DataKategori;
use App\Models\DataRak;
use App\Http\Requests\Admin\BukuRequest;
use App\Http\Requests\Admin\BukuUpdateRequest;

class DataBukuController extends Controller
{
    public function index(Request $request)
    {
        if($request->ajax()) {
            $data = DataBuku::withTrashed()->with('kategori', 'rak');
            
            return Datatables::of($data)
                ->addIndexColumn()
                ->filter(function ($instance) use ($request) {
                    if($request->has('kategori_id') && !is_null($request->get('kategori_id'))) {
                        if($request->rak_id) {
                             $instance->where('data_kategori_id', $request->kategori_id)->where('data_rak_id', $request->rak_id);
                        }
                         $instance->where('data_kategori_id', $request->kategori_id);
                    } 
                    if($request->has('rak_id') && !is_null($request->get('rak_id'))) {
                        if($request->kategori_id) {
                             $instance->where('data_rak_id', $request->rak_id)->where('data_kategori_id', $request->kategori_id);
                        }
                         $instance->where('data_rak_id', $request->rak_id);
                    } 
                    if($request->has('search') && !is_null($request->get('search')['value'])) {                        
                        $instance->where('judul', 'LIKE', '%'.$request->get('search')['value'].'%')
                            ->orwhere('kode_buku', 'LIKE', '%'.$request->get('search')['value'].'%')
                            ->orwhere('pengarang', 'LIKE', '%'.$request->get('search')['value'].'%')
                            ->orwhere('penerbit', 'LIKE', '%'.$request->get('search')['value'].'%')
                            ->orwhere('th_terbit', 'LIKE', '%'.$request->get('search')['value'].'%');
                    }
                })
                ->addColumn('cover', function ($row) {
                    return '<img src="'.asset('assets/img/buku/'.$row->gambar).'" style="height: 200px; width: 150px;">';
                })
                ->addColumn('kategori', function ($row) {
                    return '<span class="badge bg-dark">'.$row->kategori->name.'</span>';
                })
                ->addColumn('rak', function ($row) {
                    return '<span class="badge bg-dark">Rak '.$row->rak->name.'</span>';
                })
                ->addColumn('jumlah', function ($row) {
                    if($row->jumlah <= 0) {
                        return '<span class="badge bg-warning">Kosong</span>';
                    } else {
                        return $row->jumlah;
                    }
                })
                ->addColumn('status', function ($row) {
                    if (!$row->trashed()) {
                        return '<span class="badge bg-success">Aktif</span>';
                    } else {
                        return '<span class="badge bg-danger">Non-Aktif</span>';
                    }
                })
                ->addColumn('action', function ($row) {
                    $edit = '<a href="'.route('admin.data-buku.edit', $row->id).'" class="btn btn-secondary btn-sm">EDIT</a>'; 
                    if($row->trashed()) {
                        $delete = '<a href="javascript:void(0)" onclick="destroy('.$row->id.')" class="btn btn-success btn-sm mx-2">Aktifkan</a>';
                    } else {
                        $delete = '<a href="javascript:void(0)" onclick="destroy('.$row->id.')" class="btn btn-danger btn-sm mx-2">Non-Aktifkan</a>';
                    }
                    return $edit.$delete;
                })
                ->rawColumns(['cover', 'kategori', 'jumlah', 'status', 'action', 'rak'])
                ->make();
        }

        return view('admin.databuku.index');
    }

    public function create()
    {
        $kategori   = DataKategori::all();
        $rak        = DataRak::all();

        return view ('admin.databuku.tambah', compact('kategori', 'rak'));
    }

    public function store(BukuRequest $request)
    {
        if($request->hasFile('gambar')){
            $request->validate([
                'gambar'        => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]);
            $image              = $request->file('gambar');
            $imageName          = $request->judul.'_'.time().'.'.$image->getClientOriginalExtension();
            $destinationPath    = public_path('/assets/img/buku');
            $image->move($destinationPath, $imageName);
            DataBuku::create(array_merge($request->validated(), ['gambar' => $imageName]));
        } else {
            DataBuku::create($request->validated());
        }

        return redirect()->route('admin.data-buku.index')->with('success', 'Data Buku berhasil ditambahkan');
    }

    public function edit($id)
    {
        $buku       = DataBuku::withTrashed()->find($id);
        $kategori   = DataKategori::all();
        $rak        = DataRak::all();

        return view('admin.databuku.edit', compact('buku', 'kategori', 'rak'));
    }

    public function update(BukuUpdateRequest $request, $id)
    {
        $buku = DataBuku::withTrashed()->find($id);

        if($request->hasFile('gambar')){
            $request->validate([
                'gambar'        => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]);
            $image              = $request->file('gambar');
            $imageName          = time().'.'.$image->getClientOriginalExtension();
            $destinationPath    = public_path('/assets/img/buku');
            $image->move($destinationPath, $imageName);

            $buku->update(array_merge($request->validated(), ['gambar' => $imageName]));
        } else {
            $buku->update($request->validated());
        }

        return redirect()->route('admin.data-buku.index')->with('success', 'Data Buku berhasil diperbaharui');
    }

    public function destroy($id)
    {
        $buku = DataBuku::withTrashed()->find($id);
        if($buku->trashed()) {
            $buku->restore();
        } else {
            $buku->delete();
        }

        return response()->json([
            'message' => 'success'
        ]);
    }
}
