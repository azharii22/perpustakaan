<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;

use App\Models\DataBuku;
use App\Models\DataKategori;
use App\Models\DataRak;

class BukuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kategori   = ['Buku Umum', 'Buku Pelajaran', 'Majalah', 'Novel', 'Komik'];
        $rak        = ['A', 'B', 'C', 'D', 'E'];

        for($i=0; $i<count($kategori); $i++) {
            $k = DataKategori::create([
                'name'  => $kategori[$i],
            ]);

            $r = DataRak::create([
                'name'  => $rak[$i],
            ]);

            DataBuku::create([
                'data_kategori_id'  => $k->id,
                'data_rak_id'       => $r->id,
                'judul'             => 'Buku '.($i+1),
                'jumlah'            => rand(1, 10),
                'pengarang'         => 'Pengarang'.($i+1),
                'penerbit'          => 'Penerbit'.($i+1),
                'th_terbit'         => Carbon::now()->subYear(rand(1,5))->format('Y'),
                'deskripsi'         => 'Deskripsi Buku',
                'gambar'            => 'buku.jpg',
            ]);
        }
    }
}
