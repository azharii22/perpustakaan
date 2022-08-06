<?php

namespace Database\Seeders;

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

        for($i=0; $i<5; $i++) {
            User::create([
                'name'      => 'User'.($i+1),
                'username'  => 'ID-USER'.($i+1),
                'email'     => 'user'.($i+1).'@perpus.com',
                'is_admin'  => 0,
                'password'  => bcrypt('123456'),
            ]);
        }
    }
}
