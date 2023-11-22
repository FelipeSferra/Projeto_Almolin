<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ArmazemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $table = 'armazem';
        $cidades = array("Assis", "Taruma", "Ourinhos", "Presidente Prudente", "Palmital", "Marilia");
        $quantidade = count($cidades);

        DB::statement("ALTER TABLE $table AUTO_INCREMENT = 1;");

        for ($i = 0; $i < $quantidade; $i++) {
            DB::table($table)->insert([
                'desc' => "Almolin - " . $cidades[$i],
                'id_emp' => random_int(1,6),
                'cidade' => $cidades[$i],
                'endereco' => "Rua " . random_int(1,100),
                'bairro' => "Bairro " . random_int(1,50),
                'numero' =>  random_int(1,1000),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
