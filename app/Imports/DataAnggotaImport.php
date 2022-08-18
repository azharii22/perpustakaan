<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Carbon\Carbon;

use App\Models\User;

class DataAnggotaImport implements ToCollection, WithHeadingRow, WithValidation
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        foreach($collection as $data) {
            if($data->filter()->isNotEmpty()) {
                User::create([
                    'name'          => $data['nama'],
                    'username'      => $data['id_anggota'],
                    'email'         => $data['email'],
                    'kelas'         => $data['kelas'],
                    'tanggal_lahir' => Carbon::parse($data['tanggal_lahir']),
                    'phone'         => $data['no_hp'],
                    'address'       => $data['alamat'],
                    'password'      => bcrypt($data['password'])
                ]);
            }
        }
    }

    public function rules(): array
    {
        return [
            'nama'      => 'required|string',
            'id_anggota'  => 'required|unique:users,username',
            'email'     => 'required|unique:users,email',
            'kelas'     => 'required',
            'tanggal_lahir' => 'required',
            'no_hp'     => 'nullable|numeric',
            'alamat'   => 'nullable',
            'password'  => 'required'
        ];
    }
}
