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
            'username' => 'dionadmin',
            'email' => 'dion@admin.com',
            'phone' => '081224622782',
            'address' => 'pekanbaru', // Perbaikan ejaan dari 'addres' ke 'address'
            'password' => Hash::make('admindion'),
            'role_id' => 2
        ]);

        DB::table('users')->insert([
            'username' => 'dionuser',
            'email' => 'dion@user.com',
            'phone' => '081224622783',
            'address' => 'pku', // Perbaikan ejaan dari 'addres' ke 'address'
            'password' => Hash::make('userdion'),
            'role_id' => 1
        ]);
    }
}