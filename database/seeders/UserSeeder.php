<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => "yahia bajbouj",
            'email' => 'yahia.bajbouj@gmail.com',
            'password' => Hash::make('123456789'),
            'role' => 'admin',
        ]);
    }
}
