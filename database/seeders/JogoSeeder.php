<?php

namespace Database\Seeders;

use App\Models\Jogo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JogoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Jogo::create([
            'titulo' => 'Matemática Básica',
            'disciplina' => 'Matemática',
            'escolaridade_recomendada' => 'Fundamental I',
            'id_criador' => '4',
            'descricao' => 'Resolva operações simples de adição e subtração.',
            'template' => 'queda_pergunta',
            'codigo' => json_encode([
                'acento' => 'on',
                'maiusculo' => null,
                'tempo' => '5',
                '0' => ['pergunta' => '3 + 2', 'respostas' => ['5', 'cinco']],
                '1' => ['pergunta' => '10 - 7', 'respostas' => ['3', 'três']],
                '2' => ['pergunta' => '6 + 4', 'respostas' => ['10', 'dez']],
                '3' => ['pergunta' => '9 - 3', 'respostas' => ['6', 'seis']],
                '4' => ['pergunta' => '5 + 5', 'respostas' => ['10', 'dez']],
            ])
            ]
        );

        Jogo::create([
            
            'titulo' => 'Tradução de Cores',
            'disciplina' => 'Inglês',
            'escolaridade_recomendada' => 'Fundamental I',
            'id_criador' => '5',
            'descricao' => 'Traduza as cores do português para o inglês.',
            'template' => 'queda_pergunta',
            'codigo' => json_encode([
                'acento' => null,
                'maiusculo' => 'on',
                'tempo' => '7',
                '0' => ['pergunta' => 'Azul', 'respostas' => ['BLUE']],
                '1' => ['pergunta' => 'Amarelo', 'respostas' => ['YELLOW']],
                '2' => ['pergunta' => 'Vermelho', 'respostas' => ['RED']],
                '3' => ['pergunta' => 'Verde', 'respostas' => ['GREEN']],
                '4' => ['pergunta' => 'Rosa', 'respostas' => ['PINK']],
            ])
            

            ]);

            Jogo::create([

  'titulo' => 'Capitais do Mundo',
  'descricao' => 'Descubra a capital de alguns países.',
  'escolaridade_recomendada' => 'Fundamental II',
  'id_criador' => '7',
  'disciplina' => 'Geografia',
  'template' => 'queda_pergunta',
  'codigo' => json_encode([
    'acento' => 'on',
    'maiusculo' => null,
    'tempo' => '8',
    '0' => ['pergunta' => 'Brasil', 'respostas' => ['Brasília']],
    '1' => ['pergunta' => 'França', 'respostas' => ['Paris']],
    '2' => ['pergunta' => 'Argentina', 'respostas' => ['Buenos Aires']],
    '3' => ['pergunta' => 'Japão', 'respostas' => ['Tóquio', 'Tokyo']],
    '4' => ['pergunta' => 'Alemanha', 'respostas' => ['Berlim', 'Berlin']],
  ])


            ]);

            Jogo::create([
'titulo' => 'Desafio da Tabuada',

'disciplina' => 'Matemática',
  'descricao' => 'Responda multiplicações simples.',
  'escolaridade_recomendada' => 'Fundamental I',
  'id_criador' => '4',
  'template' => 'queda_pergunta',
  'codigo' => json_encode([
    'acento' => null,
    'maiusculo' => null,
    'tempo' => '6',
    '0' => ['pergunta' => '3 x 3', 'respostas' => ['9']],
    '1' => ['pergunta' => '4 x 2', 'respostas' => ['8']],
    '2' => ['pergunta' => '5 x 5', 'respostas' => ['25']],
    '3' => ['pergunta' => '7 x 1', 'respostas' => ['7']],
    '4' => ['pergunta' => '6 x 2', 'respostas' => ['12']],
  ])
            ]);

            Jogo::create([
'titulo' => 'Tradução de Animais',
  'descricao' => 'Traduza os nomes dos animais para o inglês.',
  'disciplina' => 'Inglês',
  'id_criador' => '5',
  'escolaridade_recomendada' => 'Fundamental I',
  'template' => 'queda_pergunta',
  'codigo' => json_encode([
    'acento' => null,
    'maiusculo' => 'on',
    'tempo' => '6',
    '0' => ['pergunta' => 'Cachorro', 'respostas' => ['DOG']],
    '1' => ['pergunta' => 'Gato', 'respostas' => ['CAT']],
    '2' => ['pergunta' => 'Cavalo', 'respostas' => ['HORSE']],
    '3' => ['pergunta' => 'Pássaro', 'respostas' => ['BIRD']],
    '4' => ['pergunta' => 'Peixe', 'respostas' => ['FISH']],
  ])
            ]);
    }
}
