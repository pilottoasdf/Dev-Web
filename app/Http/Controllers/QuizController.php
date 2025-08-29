<?php

namespace App\Http\Controllers;

use App\Models\Preferencia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Quiz;
use App\Models\User;

class QuizController extends Controller
{

    public function show(){
        $quizzes = Quiz::orderBy('id', 'desc')->get();
        $dados = [];
        foreach($quizzes as $quiz){
            $dados[] = [
                'quiz'=>$quiz,
                'criador'=>User::find($quiz->id_criador)
            ];
        }
        return view('main.quizzes', [
            'dados'=> $dados,
        ]);
    }

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
            'disciplina' => session('projeto.disciplina'),
            'escolaridade_recomendada' => session('projeto.escolaridade_recomendada'),
            'imagem' => session('projeto.imagem'),
            'perguntas' => $json,
            'id_criador' => $user->id,
        ]);

        return redirect()->route('projetos');
        
    }

    private function sanitizeDisciplina($disciplina)
{
    $disciplina = trim($disciplina);

    $disciplinaSemAcento = \Normalizer::normalize($disciplina, \Normalizer::FORM_D);
    $disciplinaSemAcento = preg_replace('/\p{Mn}/u', '', $disciplinaSemAcento);

    // Transforma tudo em minúsculo ANTES de aplicar o regex
    $disciplinaMinuscula = strtolower($disciplinaSemAcento);

    // Agora remove o que não for letra minúscula
    return preg_replace('/[^a-z]/', '', $disciplinaMinuscula);
}

    public function loadQuiz($id)
{
    $quiz = Quiz::findOrFail($id);
    $user = Auth::user();

    $preferencia = $user->preferencia ?? Preferencia::firstOrCreate(['id_usuario' => $user->id]);

    if ($quiz->disciplina) {
        $campo = 'peso_' . $this->sanitizeDisciplina($quiz->disciplina);
        

        if (array_key_exists($campo, $preferencia->getAttributes())) {
            $preferencia->$campo = intval($preferencia->$campo) + 1;
            $preferencia->save();
        }
    }

    $json = json_encode($quiz);
    return view('main.quiz', ['json' => $json]);

    AbertosRecentemente::create([
    'id_usuario' => $user->id,
    'id_quiz' => $quiz->id
]);

}

    public function delete(Quiz $quiz){
        $user=Auth::user();

        if($user->id===$quiz->id_criador){
            $quiz->delete();
        }

        return redirect()->route('projetos');
    }
}


