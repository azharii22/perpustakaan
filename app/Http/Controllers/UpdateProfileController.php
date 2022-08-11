<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\ProfileUpdateRequest;

class UpdateProfileController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(ProfileUpdateRequest $request)
    {
        $user = auth()->user();

        if($request->hasFile('foto')){
            $request->validate([
                'foto'        => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]);
            $image              = $request->file('foto');
            $imageName          = time().'.'.$image->getClientOriginalExtension();
            $destinationPath    = public_path('/assets/img/profile');
            $image->move($destinationPath, $imageName);

            $user->update(array_merge($request->validated(), ['foto' => $imageName]));
        } else {
            $user->update($request->validated());
        }

        if($user->is_admin != 0) {
            return redirect()->route('admin.profile')->with('success', 'Profile berhasil diperbaharui');
        } else {
            return redirect()->route('profile');
        }
    }
}
