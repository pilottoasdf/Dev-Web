<?php

namespace Database\Seeders;

use App\Models\Quiz;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuizSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Quiz::create([
            'titulo' => 'Quatro operações básicas',
            'descricao' => 'Um quiz com perguntas e cálculos sobre as quatros operações básica da matemática.',
            'disciplina' => 'Matemática',
            'escolaridade_recomendada' => 'Fundamental I',
            'imagem' => 'imagens/MKwS54bv1kiJrnwk5gI9JesukB7xikShmHiT0mqt.png',
            'perguntas' => '[{"pergunta":"Quanto \u00e9 2+2?","alternativas":["4","5","3,99","3,4"],"alternativa_correta":"1"},{"pergunta":"Quanto \u00e9 5-3?","alternativas":["1","2","8","3"],"alternativa_correta":"2"},{"pergunta":"Quanto \u00e9 3*4","alternativas":["8","9","14","12"],"alternativa_correta":"4"},{"pergunta":"Quanto \u00e9 50\/10?","alternativas":["5","15","2","10"],"alternativa_correta":"1"},{"pergunta":"Quanto \u00e9 9*3?","alternativas":["24","32","27","35"],"alternativa_correta":"3"},{"pergunta":"Quanto \u00e9 5*5?","alternativas":["20","15","55","25"],"alternativa_correta":"4"},{"pergunta":"Quanto \u00e9 4*2-2?","alternativas":["2","6","10","4"],"alternativa_correta":"2"},{"pergunta":"Quanto \u00e9 4\/2+5","alternativas":["7","13","8","10"],"alternativa_correta":"1"},{"pergunta":"Quanto \u00e9 2*2*2?","alternativas":["6","22","8","222"],"alternativa_correta":"3"},{"pergunta":"Quanto \u00e9 (5+5)\/2?","alternativas":["4","7","10","5"],"alternativa_correta":"4"}]',
            'id_criador' => '4',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Quiz::create([
            'titulo' => 'Interpretação de Texto Curto',
            'descricao' => 'Um quiz com perguntas baseadas na interpretação de pequenos trechos de texto.',
            'disciplina' => 'Português',
            'escolaridade_recomendada' => 'Fundamental I',
            'imagem' => 'imagens/vgR6TyYr2Lve0CvdZivZLlEqtX1SmModVBIkYZmj.png',
            'perguntas' => '[{"pergunta":"\"João correu tanto que chegou suado.\" O que isso indica?","alternativas":["João estava com medo","João se esforçou muito","João não chegou","João foi devagar"],"alternativa_correta":"2"},{"pergunta":"\"Maria dormiu cedo porque estava cansada.\" Por que Maria dormiu cedo?","alternativas":["Estava doente","Era aniversário","Estava cansada","Era tarde"],"alternativa_correta":"3"},{"pergunta":"\"O cachorro latiu quando viu o carteiro.\" O que o cachorro fez?","alternativas":["Correu","Latiu","Mordeu","Dormiu"],"alternativa_correta":"2"},{"pergunta":"\"A menina leu um livro e aprendeu muito.\" O que isso mostra?","alternativas":["Ler é divertido","Livros são caros","Ler ensina","Livros são ruins"],"alternativa_correta":"3"},{"pergunta":"\"O sol brilhava forte no céu azul.\" Como estava o tempo?","alternativas":["Chuvoso","Nublado","Frio","Ensolarado"],"alternativa_correta":"4"}]',
            'id_criador' => '6',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Quiz::create([
            'titulo' => 'Revolução Francesa',
            'descricao' => 'Perguntas sobre os principais acontecimentos e consequências da Revolução Francesa.',
            'disciplina' => 'História',
            'escolaridade_recomendada' => 'Ensino Médio',
            'imagem' => 'imagens/Ah9Wgdwj6Dj5s0OlsKhRd2AlhoXScWn8foxYfOzl.webp',
            'perguntas' => '[{"pergunta":"Em que ano começou a Revolução Francesa?","alternativas":["1789","1804","1750","1815"],"alternativa_correta":"1"},{"pergunta":"Qual era o lema da Revolução Francesa?","alternativas":["Paz, pão e terra","Ordem e progresso","Liberdade, igualdade e fraternidade","Trabalho, justiça e fé"],"alternativa_correta":"3"},{"pergunta":"Quem era o rei da França quando a revolução começou?","alternativas":["Luís XIV","Luís XV","Luís XVI","Napoleão Bonaparte"],"alternativa_correta":"3"},{"pergunta":"O que foi a Tomada da Bastilha?","alternativas":["Fim da monarquia","Ataque ao palácio real","Libertação de presos políticos","Início da guerra contra a Inglaterra"],"alternativa_correta":"3"},{"pergunta":"Qual classe social liderou o Terceiro Estado?","alternativas":["Nobreza","Clero","Burguesia","Realeza"],"alternativa_correta":"3"}]',
            'id_criador' => '8',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Quiz::create([
            'titulo' => 'Brasil Império',
            'descricao' => 'Quiz sobre o período imperial do Brasil, do Primeiro Reinado à Proclamação da República.',
            'disciplina' => 'História',
            'escolaridade_recomendada' => 'Ensino Médio',
            'imagem' => 'imagens/JqrVMoSgflfvxoAZ6uK3vYilLZDBjHClQkupXj8b.jpg',
            'perguntas' => '[{"pergunta":"Quem foi o primeiro imperador do Brasil?","alternativas":["Dom Pedro I","Dom João VI","Dom Pedro II","Tiradentes"],"alternativa_correta":"1"},{"pergunta":"Em que ano foi proclamada a independência do Brasil?","alternativas":["1808","1822","1889","1831"],"alternativa_correta":"2"},{"pergunta":"Qual foi o evento que marcou o fim do Segundo Reinado?","alternativas":["Guerra do Paraguai","Abolição da escravidão","Proclamação da República","Renúncia de Dom Pedro II"],"alternativa_correta":"3"},{"pergunta":"Qual conflito envolveu o Brasil durante o Império?","alternativas":["Guerra do Paraguai","Guerra dos Cem Anos","Revolução Farroupilha","Inconfidência Mineira"],"alternativa_correta":"1"},{"pergunta":"Quem assinou a Lei Áurea?","alternativas":["Dom Pedro II","Marechal Deodoro","Princesa Isabel","José Bonifácio"],"alternativa_correta":"3"}]',
            'id_criador' => '8',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Quiz::create([
            'titulo' => 'Relevo e Clima do Brasil',
            'descricao' => 'Quiz sobre as principais características do relevo e clima do território brasileiro.',
            'disciplina' => 'Geografia',
            'escolaridade_recomendada' => 'Fundamental II',
            'imagem' => 'imagens/r3quUH9pdfykMvk545liegpb0QNGoeNmyxd9Qbr9.webp',
            'perguntas' => '[{"pergunta":"Qual é a forma de relevo mais comum no Brasil?","alternativas":["Montanhas","Planaltos","Depressões","Planícies"],"alternativa_correta":"2"},{"pergunta":"O clima predominante na região Norte do Brasil é:","alternativas":["Tropical de Altitude","Equatorial","Semiárido","Subtropical"],"alternativa_correta":"2"},{"pergunta":"Qual destas regiões possui clima Semiárido?","alternativas":["Sul","Sudeste","Nordeste","Norte"],"alternativa_correta":"3"},{"pergunta":"O relevo do Brasil é caracterizado principalmente por:","alternativas":["Altas montanhas","Formações vulcânicas","Áreas de planalto e planícies","Desertos e dunas"],"alternativa_correta":"3"},{"pergunta":"Qual elemento influencia diretamente o clima de uma região?","alternativas":["Vegetação","Rios","Relevo","Cidades"],"alternativa_correta":"3"}]',
            'id_criador' => '7',
            'created_at' => now(),
            'updated_at' => now(),
        ]);


    }
}
