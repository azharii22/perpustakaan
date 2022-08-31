<?php

namespace Database\Seeders;

use App\Models\TahunAkademik;
use Illuminate\Database\Seeder;

use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'      => 'Admin',
            'username'  => 'admin',
            'email'     => 'admin@perpus.com',
            'is_admin'  => 1,
            'password'  => bcrypt('123456'),
        ]);

        $ta = TahunAkademik::find(1);

        for($i=0; $i<5; $i++) {
            User::create([
                'name'      => 'User'.($i+1),
                'username'  => 'ID-USER'.($i+1),
                'kelas'     => random_int(7, 9),
                'email'     => 'user'.($i+1).'@perpus.com',
                'angkatan'  => $ta->id,
                'is_admin'  => 0,
                'password'  => bcrypt('123456'),
            ]);
        }
    }
}
