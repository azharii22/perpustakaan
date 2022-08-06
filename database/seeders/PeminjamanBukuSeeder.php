<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Peminjaman;
use App\Models\DataBuku;
use App\Models\User;

class PeminjamanBukuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0; $i<rand(20, 25); $i++) {
            $user = User::user()->find(rand(2,6));
            $buku = DataBuku::available()->find(rand(1, 15));
            Peminjaman::create([
                'user_id'           => $user->id,
                'data_buku_id'      => $buku->id,
                'tanggal_diambil'   => \Carbon\Carbon::now()->addDays(rand(1, 30)),
            ]);
        };
    }
}
