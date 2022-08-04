<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\DataKategori;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kategori = ['Buku Umum', 'Buku Pelajaran', 'Majalah', 'Novel', 'Komik', 'Koran'];

        for($i=0; $i<count($kategori); $i++) {
            DataKategori::create([
                'name'  => $kategori[$i],
            ]);
        }
    }
}
