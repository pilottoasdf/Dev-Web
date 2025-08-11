<?php

namespace App\Http\Controllers;

use App\Models\Jogo;
use App\Models\Preferencia;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JogoController extends Controller
{

    public function show(){
        $jogos = Jogo::orderBy('id', 'desc')->get();
        $dados = [];
        foreach($jogos as $jogo){
            $dados[] = [
                'jogo'=>$jogo,
                'criador'=>User::find($jogo->id_criador)
            ];
        }
        return view('main.jogos', [
            'dados'=> $dados,
        ]);
    }

    public function create($template){
        session(['template'=>$template]);
        return view('criar-projeto.jogo', ['template' => $template]);
    }

    public function store(Request $request){
        $dados = $request->all();

        if(session('template')=='queda_pergunta'){
            $perguntas = [
                'acento' => $request->input("acento"),
                'maiusculo' => $request->input("maiusculo"),
                'tempo' => $request->input("tempo"),
            ];
            $count = count($dados)-2;

            for($i=0; $i<$count; $i++){
                $perguntas[] = [
                    'pergunta' => $request->input("pergunta_$i"),
                ];
                $respostas=[];

                for($j=0; $j<$count; $j++){
                    if($request->input("resposta_$i$j")){
                        $respostas[]=$request->input("resposta_$i$j");
                        $count--;
                    }else{
                        break;
                    }
                }
                $perguntas[$i]['respostas']=$respostas;
            }

            $json = json_encode($perguntas);
        }

        $user = Auth::user();

        $jogo = Jogo::create([
            'titulo' => session('projeto.titulo'),
            'descricao' => session('projeto.descricao'),
            'disciplina' => session('projeto.disciplina'),
            'escolaridade_recomendada' => session('projeto.escolaridade_recomendada'),
            'imagem' => session('projeto.imagem'),
            'codigo' => $json,
            'template' => session('template'),
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


    public function loadJogo($id)
{
    $jogo = Jogo::findOrFail($id);
    $user = Auth::user();

  $preferencia = $user->preferencia ?? Preferencia::firstOrCreate(['id_usuario' => $user->id]);

    if ($jogo->disciplina) {
        $campo = 'peso_' . $this->sanitizeDisciplina($jogo->disciplina);

        if (array_key_exists($campo, $preferencia->getAttributes())) {
            $preferencia->$campo += 1;
            $preferencia->save();
        }
    }
  
    $json = json_encode($jogo);
    return view('main.jogo', ['json' => $json, 'template' => $jogo->template]);

    AbertosRecentemente::create([
    'id_usuario' => $user->id,
    'id_jogo' => $jogo->id
]);


}

    public function delete($id){
        $user=Auth::user();
        $jogo = Jogo::findOrFail($id);

        if($user->id===$jogo->id_criador){
            $jogo->delete();
        }

        return redirect()->route('projetos');
    }
}
