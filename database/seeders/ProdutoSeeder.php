<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProdutoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $table = 'produto';
        $produtos = array("Parafuso Sextavado Rosca Soberba","Trena 3m", "Martelo", "Chave Phillips", "Broca de 3 pontas","Ferro de Solda 50W");
        $categorias = array("Parafusos", "Trenas", "Martelos", "Chaves", "Brocas", "Ferros de Solda");
        $quantidade = count($produtos);

        DB::statement("ALTER TABLE $table AUTO_INCREMENT = 1;");

        for ($i = 0; $i < $quantidade; $i++) {
            $categoria = DB::table('categoria')->where('desc', 'like', '%' . $categorias[$i] . '%')->first();
            DB::table($table)->insert([
                'desc' => $produtos[$i],
                'custo' => random_int(10,200),
                'qtd' => random_int(5,45),
                'id_cat' => $categoria->id,
                'id_arm' => random_int(1,6),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
