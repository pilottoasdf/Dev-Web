<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PerfilController extends Controller
{
    public function infoPerfil(){
        $user = Auth::user();

        //pontos estrela e troféu
        // compact
        return view('user-info.perfil', ['user'=>$user]);
    }

    public function infoUser(){
        $user = Auth::user();

        $date = date_create($user->data_nasc);
        return view('user-info.infos', ['user'=>$user, 'date'=>date_format($date, "d/m/Y")]);

    }
}
