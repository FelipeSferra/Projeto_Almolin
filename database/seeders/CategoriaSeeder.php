<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $table = 'categoria';
        $categorias = array("Parafusos", "Trenas", "Martelos", "Chaves", "Brocas", "Ferros de Solda");
        $quantidade = count($categorias);

        DB::statement("ALTER TABLE $table AUTO_INCREMENT = 1;");

        for ($i = 0; $i < $quantidade; $i++) {
            DB::table($table)->insert([
                'desc' => $categorias[$i],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
