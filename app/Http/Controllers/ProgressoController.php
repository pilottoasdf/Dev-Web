<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ProgressoQuiz;
use App\Models\Quiz;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProgressoController extends Controller
{
    public function create(Request $request){
        $user = Auth::user();
        $progresso = ProgressoQuiz::create([
            'id_usuario' => $user->id,
            'id_quiz' => $request->id_quiz,
            'tentativas' => 1,
            'pontos' => (($request->acertos*10)/$request->perguntas),
            'trofeu' => false,
        ]);

        return(view('main.acertos', [
            'acertos'=>$request->acertos,
            'perguntas'=>$request->perguntas,
        ]));
    }

    public function show(){
        $progressos = ProgressoQuiz::all();
        $dados = [];
        foreach($progressos as $progresso){
            $dados[] = [
                'progresso'=>$progresso,
                'quiz'=>Quiz::find($progresso->id_quiz),
                'usuario'=>User::find($progresso->id_usuario)
            ];
        }
        return view('teste', [
            'dados'=> $dados,
        ]);
    }
}
