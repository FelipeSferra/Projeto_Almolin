<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class EmpresaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */


    public function run(): void
    {
        $table = 'empresa';
        $cidades = array("Assis", "Taruma", "Ourinhos", "Presidente Prudente", "Palmital", "Marilia");
        $quantidade = count($cidades);

        DB::statement("ALTER TABLE $table AUTO_INCREMENT = 1;");

        for ($i = 0; $i < $quantidade; $i++) {
            DB::table($table)->insert([
                'desc' => "Almolin " . ($i + 1),
                'cidade' => $cidades[$i],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
