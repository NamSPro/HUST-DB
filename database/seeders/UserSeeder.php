<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeders.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'admin1',
            'email' => 'admin1'.'@gmail.com',
            'password' => Hash::make('password'),
            'is_admin' => true,
        ]);
        DB::table('users')->insert([
            'name' => 'user1',
            'email' => 'user1'.'@gmail.com',
            'password' => Hash::make('password'),
            'is_admin' => false,
        ]);
    }
}
