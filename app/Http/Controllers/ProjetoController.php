<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Quiz;
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
}
