<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;

class UpdateKelasController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $users = User::user()->get();
        foreach($users as $user) {
            if($user->kelas === '9') {
                $user->update(['kelas' => 'LULUS']);
                $user->delete();
            } else {
                $user->increment('kelas', 1);
            }
        }

        return redirect()->route('admin.data-anggota.index')->with('success', 'Kelas anggota berhasil di update.');

    }
}
