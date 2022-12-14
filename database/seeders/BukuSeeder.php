<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Str;

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
        $kategori   = ['Pelajaran', 'Majalah', 'Novel', 'Komik', 'Fiksi'];
        $rak        = ['A', 'B', 'C', 'D', 'E'];

        for($i=0; $i<count($kategori); $i++) {
            $k = DataKategori::create([
                'name'  => $kategori[$i],
            ]);

            $r = DataRak::create([
                'name'  => $rak[$i],
            ]);

            for($j=0; $j<3; $j++) {
                DataBuku::create([
                    'data_kategori_id'  => $k->id,
                    'data_rak_id'       => $r->id,
                    'kode_buku'         => substr($k->name, 0, 1).str_pad($j+1, 3, '0', STR_PAD_LEFT).strtoupper(Str::random(3)),
                    'judul'             => 'Buku '.($k->name).' '.($j+1),
                    'jumlah'            => rand(1, 10),
                    'pengarang'         => 'Pengarang'.($j+1),
                    'penerbit'          => 'Penerbit'.($j+1),
                    'th_terbit'         => Carbon::now()->subYear(rand(1,5))->format('Y'),
                    'deskripsi'         => 'Deskripsi Buku',
                    'gambar'            => 'buku.jpg',
                ]);
            }
        }
    }
}
