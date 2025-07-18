<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ProgressoJogo;
use App\Models\ProgressoQuiz;
use App\Models\Quiz;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProgressoController extends Controller
{
    public function create(Request $request){
        $user = Auth::user();
        $pontos = (($request->acertos*10)/$request->perguntas);

        if(isset($request->id_quiz)){
            if(!ProgressoQuiz::where('id_quiz', $request->id_quiz)->where('id_usuario', $user->id)->exists()){
                $progresso = ProgressoQuiz::create([
                    'id_usuario' => $user->id,
                    'id_quiz' => $request->id_quiz,
                    'tentativas' => 1,
                    'pontos' => $pontos,
                    'trofeu' => ($pontos>=7) ? true : false,
                ]);
            }else{
                $progresso = ProgressoQuiz::where('id_quiz', $request->id_quiz)->where('id_usuario', $user->id)->first();

                $progresso->tentativas++;
                $progresso->pontos = ($pontos>=$progresso->pontos) ? $pontos : $progresso->pontos;

                $progresso->trofeu = $progresso->trofeu || ($pontos >= 7 && $progresso->tentativas<=2);

                $progresso->save();
            }

            return(view('main.acertos_quiz', [
                'acertos'=>$request->acertos,
                'perguntas'=>$request->perguntas,
            ]));

        }else if(isset($request->id_jogo)){
            if(!ProgressoJogo::where('id_jogo', $request->id_jogo)->where('id_usuario', $user->id)->exists()){
                $progresso = ProgressoJogo::create([
                    'id_usuario' => $user->id,
                    'id_jogo' => $request->id_jogo,
                    'pontos' => $pontos,
                    'trofeu' => ($pontos>=7) ? true : false,
                ]);
            }else{
                $progresso = ProgressoJogo::where('id_jogo', $request->id_jogo)->where('id_usuario', $user->id)->first();

                $progresso->pontos = ($pontos>=$progresso->pontos) ? $pontos : $progresso->pontos;

                $progresso->trofeu = $progresso->trofeu || ($pontos >= 7);

                $progresso->save();
            }

            return(view('main.acertos_jogo', [
                'acertos'=>$request->acertos,
                'perguntas'=>$request->perguntas,
            ]));
        }
    }

    public function ranking(){
        $progressos_quiz = ProgressoQuiz::select('id_usuario', DB::raw('sum(trofeu) as total'), DB::raw('AVG(pontos) as media_pontos'))->groupBy('id_usuario')->orderBy('total', 'DESC')->orderBy('media_pontos', 'desc')->get();
        $progressos_jogo = ProgressoJogo::select('id_usuario', DB::raw('sum(trofeu) as total'), DB::raw('AVG(pontos) as media_pontos'))->groupBy('id_usuario')->orderBy('total', 'DESC')->orderBy('media_pontos', 'desc')->get();
        $dados_quiz = [];
        $dados_jogo = [];
        foreach($progressos_quiz as $progresso){
            $dados_quiz[] = [
                'progresso'=>$progresso,
                'usuario'=>User::find($progresso->id_usuario)
            ];
        }
        foreach($progressos_jogo as $progresso){
            $dados_jogo[] = [
                'progresso'=>$progresso,
                'usuario'=>User::find($progresso->id_usuario)
            ];
        }
        return view('main.ranking', [
            'dados_quiz'=> $dados_quiz,
            'dados_jogo'=> $dados_jogo,
        ]);
    }
}
