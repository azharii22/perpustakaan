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
            'email'     => 'admin@perpus.com',
            'is_admin'  => 1,
            'password'  => bcrypt('123456'),
        ]);

        User::create([
            'name'      => 'User',
            'email'     => 'user@perpus.com',
            'is_admin'  => 0,
            'password'  => bcrypt('123456'),
        ]);
    }
}
