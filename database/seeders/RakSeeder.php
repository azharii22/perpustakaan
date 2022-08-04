<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\DataRak;

class RakSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rak = ['A', 'B', 'C', 'D', 'E'];

        for($i=0; $i<count($rak); $i++) {
            DataRak::create([
                'name'  => $rak[$i],
            ]);
        }
    }
}
