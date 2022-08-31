<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AnggotaStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'      => 'required|string',
            'username'  => 'required|unique:users,username',
            'email'     => 'required|unique:users,email',
            'kelas'     => 'required',
            'angkatan'  => 'required',
            'tanggal_lahir' => 'required',
            'phone'     => 'nullable|numeric',
            'address'   => 'nullable',
            'password'  => 'required|confirmed'
        ];
    }
}
