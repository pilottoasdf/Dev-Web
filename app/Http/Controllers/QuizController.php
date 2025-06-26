<?php

namespace App\Http\Controllers;

use App\Models\Preferencia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Quiz;

class QuizController extends Controller
{
    public function store(Request $request){
        $dados = $request->all();

        $perguntas = [];

        for($i=0; $i<(count($dados)-1)/6; $i++){
            $perguntas[] = [
            'pergunta' => $request->input("pergunta_$i"),
            'alternativas' => [
                $request->input("alternativa_1_$i"),
                $request->input("alternativa_2_$i"),
                $request->input("alternativa_3_$i"),
                $request->input("alternativa_4_$i"),
            ],
            'alternativa_correta' => $request->input("alternativa_correta_$i"),
            ];
        }

        $json = json_encode($perguntas);
        $user = Auth::user();

        $quiz = Quiz::create([
            'titulo' => session('projeto.titulo'),
            'descricao' => session('projeto.descricao'),
            'disciplina' => strtolower(str_replace(' ', '', session('projeto.disciplina'))),
            'escolaridade_recomendada' => session('projeto.escolaridade_recomendada'),
            'imagem' => session('projeto.imagem'),
            'perguntas' => $json,
            'id_criador' => $user->id,
        ]);

        return redirect()->route('projetos');
        
    }

    public function loadQuiz($id)
{
    $quiz = Quiz::findOrFail($id);
    $user = Auth::user();

    
   $preferencia = $user->preferencia;

    if ($preferencia && $quiz->disciplina) {
        $campo = 'peso_' . strtolower($quiz->disciplina);

        if (array_key_exists($campo, $preferencia->getAttributes())) {
            $preferencia->$campo += 1;
            $preferencia->save();
        }
    }
    $json = json_encode($quiz);
    return view('main.quiz', ['json' => $json]);
}
}
