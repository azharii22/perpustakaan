<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class BukuUpdateRequest extends FormRequest
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
            'data_kategori_id'  => 'required',
            'data_rak_id'       => 'required',
            'kode_buku'         => 'required|unique:data_bukus,kode_buku,'.$this->kode_buku.',kode_buku',
            'judul'             => 'required',
            'jumlah'            => 'required|numeric|min:0',
            'pengarang'         => 'nullable',
            'penerbit'          => 'nullable',
            'th_terbit'         => 'nullable|numeric',
            'deskripsi'         => 'nullable',
        ];
    }
}
