<?php

namespace App\Http\Controllers;

use App\Models\ProgressoQuiz;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PerfilController extends Controller
{
    public function infoPerfil(){
        $user = Auth::user();

        $progressos = ProgressoQuiz::select(DB::raw('sum(trofeu) as total'), DB::raw('AVG(pontos) as media_pontos'))->where('id_usuario', $user->id)->groupBy('id_usuario')->get();

        return view('user-info.perfil', ['user'=>$user, 'progressos'=>$progressos]);
    }

    public function infoUser(){
        $user = Auth::user();

        $date = date_create($user->data_nasc);
        return view('user-info.infos', ['user'=>$user, 'date'=>date_format($date, "d/m/Y")]);

    }

    public function editaInfo(){
        $user = Auth::user();

        $date = date_create($user->data_nasc);

        return view('user-info.editar', ['user'=>$user, 'date'=>date_format($date, "d/m/Y")]);
    }

    public function atualizaInfo(Request $request){

        $user = Auth::user(); 

        $campos = $request->validate([
            'name' => 'bail|required|max:255|unique:users,name,' . Auth::id(),
            'email' => 'bail|required|email|unique:users,email,' . Auth::id(),
            'escolaridade' => 'bail|nullable|string',
            'data_nasc' => 'bail|nullable|date',
        ]);

        $user->update([
            'name' => $campos['name'],
            'email' => $campos['email'],
            'escolaridade' => $campos['escolaridade'],
            'data_nasc' => $campos['data_nasc'],
        ]);

        return redirect()->route('user.editar')->with('success', 'Atualizado com sucesso!');

    }

}
