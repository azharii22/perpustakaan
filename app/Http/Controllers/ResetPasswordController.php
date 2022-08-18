<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\ResetPassword;

class ResetPasswordController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $user = User::where('username', $request->username)->first();
        if($user) {
            ResetPassword::create(['user_id' => $user->id]);

            return redirect()->route('login')->with('success', 'Permintaan reset password berhasil dikirim, silahkan hubungi admin.');
        }
        return redirect()->route('reset-password')->with('error', 'Permintaan reset password gagal, username tidak ditemukan.');
    }
}
