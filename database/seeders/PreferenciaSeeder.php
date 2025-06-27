<?php

namespace Database\Seeders;

use App\Models\Preferencia;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PreferenciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Preferencia::create([
            'peso_portugues' => 5,
            'peso_matematica' => 5,
            'peso_fisica' => 5,
            'peso_quimica' => 5,
            'peso_biologia' => 0,
            'peso_historia' => 0,
            'peso_geografia' => 0,
            'peso_filosofia' => 0,
            'peso_sociologia' => 5,
            'peso_ingles' => 0,
            'id_usuario'=> 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Preferencia::create([
            'peso_portugues' => 0,
            'peso_matematica' => 0,
            'peso_fisica' => 0,
            'peso_quimica' => 0,
            'peso_biologia' => 0,
            'peso_historia' => 5,
            'peso_geografia' => 5,
            'peso_filosofia' => 5,
            'peso_sociologia' => 0,
            'peso_ingles' => 5,
            'id_usuario'=> 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);    
        Preferencia::create([
            'peso_portugues' => 5,
            'peso_matematica' => 5,
            'peso_fisica' => 0,
            'peso_quimica' => 0,
            'peso_biologia' => 5,
            'peso_historia' => 0,
            'peso_geografia' => 0,
            'peso_filosofia' => 5,
            'peso_sociologia' => 0,
            'peso_ingles' => 0,
            'id_usuario'=> 3,
            'created_at' => now(),
            'updated_at' => now(),
        ]);    
        Preferencia::create([
            'peso_portugues' => 0,
            'peso_matematica' => 5,
            'peso_fisica' => 5,
            'peso_quimica' => 0,
            'peso_biologia' => 0,
            'peso_historia' => 0,
            'peso_geografia' => 5,
            'peso_filosofia' => 0,
            'peso_sociologia' => 0,
            'peso_ingles' => 0,
            'id_usuario'=> 4,
            'created_at' => now(),
            'updated_at' => now(),
        ]);    
        Preferencia::create([
            'peso_portugues' => 0,
            'peso_matematica' => 5,
            'peso_fisica' => 5,
            'peso_quimica' => 0,
            'peso_biologia' => 0,
            'peso_historia' => 0,
            'peso_geografia' => 0,
            'peso_filosofia' => 0,
            'peso_sociologia' => 0,
            'peso_ingles' => 5,
            'id_usuario'=> 5,
            'created_at' => now(),
            'updated_at' => now(),
        ]);    
    }
}
