<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\TahunAkademik;

class TahunAkademikSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TahunAkademik::create([
            'ta'    => '2021/2022',
        ]);
    }
}
