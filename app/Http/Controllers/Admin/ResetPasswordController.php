<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

use App\Http\Requests\PasswordUpdateRequest;
use App\Models\ResetPassword;
use App\Models\User;

class ResetPasswordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax()) {
            $data = ResetPassword::requested()->with('user');

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('tanggal', function ($row) {
                    return $row->created_at->format('d/m/Y');
                })
                ->addColumn('status', function ($row) {
                    if (!$row->user->trashed()) {
                        return '<span class="badge bg-success">Anggota Aktif</span>';
                    } else {
                        return '<span class="badge bg-danger">Anggota Non-Aktif</span>';
                    }
                })
                ->addColumn('action', function ($row) {
                    $edit = '<a href="'.route('admin.reset-password.edit', $row->user->id).'" class="btn btn-secondary btn-sm">RESET PASSWORD</a>'; 
                    $delete = '<a href="javascript:void(0)" onclick="destroy('.$row->id.')" class="btn btn-danger btn-sm mx-2">Hapus</a>';
                    return $edit.$delete;
                })
                ->rawColumns(['status', 'action'])
                ->make();
        }

        return view('admin.reset-password.index');
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
        $data_anggota = User::withTrashed()->find($id);

        return view('admin.reset-password.edit', compact('data_anggota'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PasswordUpdateRequest $request, $id)
    {
        $user = User::withTrashed()->find($id);
        $user->update(['password' => bcrypt($request->password)]);
        $resetLogs = ResetPassword::where('user_id', $user->id)->update(['status' => 1]);

        return redirect()->route('admin.reset-password.index')->with('success', 'Password Anggota berhasil diperbaharui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $resetLogs = ResetPassword::find($id);
        $resetLogs->delete();

        return response()->json([
            'message' => 'success'
        ]);
    }
}
