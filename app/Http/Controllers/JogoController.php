<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JogoController extends Controller
{
    public function create($template){
        return view('criar-projeto.jogo', ['template' => $template]);
    }

    public function store(Request $request){
        dd($request->all());
    }
}
