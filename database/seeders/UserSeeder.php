<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @throws \Exception
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'username' => Str::random(10),
            'email' => Str::random(10),
            'password' => Hash::make('password'),
            'nome' => Str::random(10),
            'level' => random_int(1,2),
            'cargo' => Str::random(10),
            'id_emp' => 1,
        ]);
    }
}
