<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProjetoRequest;
use App\Models\Quiz;
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

    public function create(){
        $user = Auth::user();
        if($user->nivel_acesso===2){
            return view('criar-projeto.form');
        }else{
            return redirect()->route('inicio');
        }
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
            return view('criar-projeto.jogo');
        }
    }
}
