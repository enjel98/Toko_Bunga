<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{

    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Superadmin',
            'email' => 'admin@mail.com',
            'password' => bcrypt('admin'),
            'role' => 'superadmin',
            'is_active' => 1,
            'token_activation' => Str::random(50)
        ]);
    }
}