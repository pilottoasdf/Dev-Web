<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Auth;

class PerfilController extends Controller
{
    public function infoPerfil(){
        $user = Auth::user();

        return view('user-info.perfil', ['user'=>$user]);
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

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'escolaridade' => $request->escolaridade,
            'data_nasc' => $request->data_nasc,
        ]);

        return redirect()->route('user.editar')->with('success', 'Atualizado com sucesso!');

    }

}
