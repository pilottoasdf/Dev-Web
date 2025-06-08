<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Quiz;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjetoController extends Controller
{
    public function showProjetos(){
        $user = Auth::user();
        $quizzes = Quiz::where('id_criador', $user->id)->orderBy('id', 'desc')->get();

        return view('main.projetos', [
            'quizzes'=> $quizzes,
            'criador'=> $user->name
        ]);
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
}
