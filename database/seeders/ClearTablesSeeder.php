<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ClearTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tabelas = array('transacao', 'users', 'armazem', 'categoria', 'empresa','produto');
    
        for($i = 0;$i < count($tabelas); $i++){
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');

            DB::statement("TRUNCATE TABLE " . $tabelas[$i]. ";");
    
            DB::statement("ALTER TABLE " . $tabelas[$i]. " AUTO_INCREMENT = 1;");
    
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        }
    }
}
