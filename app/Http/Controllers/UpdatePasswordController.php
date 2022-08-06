<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\PasswordUpdateRequest;

class UpdatePasswordController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(PasswordUpdateRequest $request)
    {
        $user = auth()->user();
        $user->update(['password' => bcrypt($request->password)]);

        if($user->is_admin != 0) {
            return redirect()->route('admin.profile')->with('success', 'Profile berhasil diperbaharui');
        } else {
            return redirect()->route('profile');
        }
    }
}
