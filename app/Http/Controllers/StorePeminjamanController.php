<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Peminjaman;

class StorePeminjamanController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $this->validate($request, [
            'tanggal_diambil'   => 'required|after_or_equal:today'
        ]);

        Peminjaman::create([
            'user_id'           => auth()->user()->id,
            'data_buku_id'      => $request->data_buku_id,
            'tanggal_diambil'   => $request->tanggal_diambil,
            'status'            => 'BARU'
        ]);      

        return redirect()->route('profile');
    }
}
