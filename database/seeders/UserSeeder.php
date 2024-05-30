<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{

    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Superadmin',
            'email' => 'admin@mail.com',
            'password' => password_hash('12345678', PASSWORD_DEFAULT)
        ]);
    }
}