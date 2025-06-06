<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Preferencia;
use App\Http\Requests\PreferenciaRequest;
use Illuminate\Support\Facades\Auth;

class PreferenciaController extends Controller
{
    public function create()
    {
        return view('login.preferencia');
    }

    public function store(PreferenciaRequest $request)
{
    $user = Auth::user();

    Preferencia::create([
        'id_usuario' => $user->id,
        'peso_portugues' => $request->input('peso_portugues', 0),
        'peso_matematica' => $request->input('peso_matematica', 0),
        'peso_historia' => $request->input('peso_historia', 0),
        'peso_geografia' => $request->input('peso_geografia', 0),
        'peso_biologia' => $request->input('peso_biologia', 0),
        'peso_fisica' => $request->input('peso_fisica', 0),
        'peso_quimica' => $request->input('peso_quimica', 0),
        'peso_filosofia' => $request->input('peso_filosofia', 0),
        'peso_sociologia' => $request->input('peso_sociologia', 0),
    ]);

    return redirect()->route('teste');
}
}

