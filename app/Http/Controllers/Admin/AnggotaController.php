<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

use App\Models\User;
use App\Http\Requests\Admin\AnggotaStoreRequest;
use App\Http\Requests\Admin\AnggotaUpdateRequest;

class AnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax()) {
            $data = User::user()->withTrashed();

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('status', function ($row) {
                    if (!$row->trashed()) {
                        return '<span class="badge bg-success">Aktif</span>';
                    } else {
                        return '<span class="badge bg-danger">Non-Aktif</span>';
                    }
                })
                ->addColumn('action', function ($row) {
                    $edit = '<a href="'.route('admin.data-anggota.edit', $row->id).'" class="btn btn-secondary btn-sm">EDIT</a>'; 
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
        return view('admin.data-anggota.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.data-anggota.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AnggotaStoreRequest $request)
    {
        if($request->hasFile('foto')){
            $request->validate([
                'foto'        => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]);
            $image              = $request->file('foto');
            $imageName          = time().'.'.$image->getClientOriginalExtension();
            $destinationPath    = public_path('/assets/img/profile');
            $image->move($destinationPath, $imageName);
            User::create(array_merge($request->validated(), ['foto' => $imageName]));
        } else {
            User::create(array_merge($request->validated(), ['password' => bcrypt($request->password)]));
        }

        return redirect()->route('admin.data-anggota.index')->with('success', 'Data Anggota berhasil ditambahkan');
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
        $data_anggota = User::withTrashed()->find($id);

        return view('admin.data-anggota.edit', compact('data_anggota'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AnggotaUpdateRequest $request, $id)
    {
        $data_anggota = User::withTrashed()->find($id);

        if($request->hasFile('foto')){
            $request->validate([
                'foto'        => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]);
            $image              = $request->file('foto');
            $imageName          = time().'.'.$image->getClientOriginalExtension();
            $destinationPath    = public_path('/assets/img/profile');
            $image->move($destinationPath, $imageName);
            $data_anggota->update(array_merge($request->validated(), ['foto' => $imageName, 'password' => bcrypt($request->password)]));
        } else {
            $data_anggota->update(array_merge($request->validated(), ['password' => bcrypt($request->password)]));
        }

        return redirect()->route('admin.data-anggota.index')->with('success', 'Data Anggota berhasil diperbaharui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data_anggota = User::withTrashed()->find($id);
        if($data_anggota->trashed()) {
            $data_anggota->restore();
        } else {
            $data_anggota->delete();
        }

        return response()->json([
            'message' => 'success'
        ]);
    }
}
