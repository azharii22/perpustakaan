<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

use App\Imports\DataAnggotaImport;

class ImportDataAnggotaController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        Excel::import(new DataAnggotaImport, $request->file);

        return redirect()->route('admin.data-anggota.index')->with('success', 'Data Anggota berhasil ditambahkan');
    }
}
