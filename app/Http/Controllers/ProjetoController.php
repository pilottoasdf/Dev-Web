<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProjetoRequest;
use App\Models\Quiz;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjetoController extends Controller
{
    public function showProjetos(){
        $user = Auth::user();
        if($user->nivel_acesso===2){
            $quizzes = Quiz::where('id_criador', $user->id)->orderBy('id', 'desc')->get();

            return view('main.projetos', [
                'quizzes'=> $quizzes,
                'criador'=> $user->name
            ]);
        }else{
            return redirect()->route('inicio');
        }
    }

    public function showQuizzes(){
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

    public function create(){
        return view('criar-projeto.form');
    }

    public function createQuizJogo(ProjetoRequest $request){
        if($request->file('imagem')){
            $caminho = $request->file('imagem')->store('imagens', 'public');
        }

        session([
            'projeto' => [
                'titulo' => $request->titulo,
                'descricao' => $request->descricao,
                'disciplina' => $request->disciplina,
                'escolaridade_recomendada' => $request->escolaridade_recomendada,
                'imagem' => ($request->file('imagem')) ? $caminho : null
            ]
        ]);
        if($request->tipo=='quiz'){
            return view('criar-projeto.quiz');

        }else if($request->tipo=='jogo'){

        }
    }
}
