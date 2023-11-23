<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RunAllSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call(CategoriaSeeder::class);
        $this->call(EmpresaSeeder::class);
        $this->call(ArmazemSeeder::class);
        $this->call(ProdutoSeeder::class);
        $this->call(UserSeeder::class);
    }
}
