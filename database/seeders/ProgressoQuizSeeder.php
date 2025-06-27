<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProgressoQuizSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $registros = [];

        for ($usuario = 1; $usuario <= 8; $usuario++) {
            for ($quiz = 1; $quiz <= 5; $quiz++) {
                $tentativas = rand(1, 3);

                $pontos = round(rand(0, 100) / 10, 1);

                $trofeu = $pontos >= 7;

                $registros[] = [
                    'id_usuario' => $usuario,
                    'id_quiz' => $quiz,
                    'tentativas' => $tentativas,
                    'pontos' => $pontos,
                    'trofeu' => $trofeu,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }

        DB::table('progresso_quizzes')->insert($registros);
    }
}
