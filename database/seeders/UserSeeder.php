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
        $table = 'users';
        DB::statement("ALTER TABLE $table AUTO_INCREMENT = 1;");

        for ($i = 0; $i < 2; $i++) {
            
            DB::table($table)->insert([
                'username' => $i === 0 ? "admin" : "User" .($i+1),
                'email' => Str::random(10),
                'password' => Hash::make('password'),
                'nome' => $i === 0 ? "admin" : "User" .($i+1),
                'level' => $i === 0 ? 3 : random_int(1,2),
                'cargo' => $i === 0 ? "Administrador" : "Almoxarife",
                'id_emp' => random_int(1, 6),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
