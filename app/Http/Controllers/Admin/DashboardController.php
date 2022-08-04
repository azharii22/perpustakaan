<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\DataBuku;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $totalAnggota   = User::user()->count();
        $totalBuku      = DataBuku::sum('jumlah');

        return view('admin.dashboard', compact('totalAnggota', 'totalBuku'));
    }
}
