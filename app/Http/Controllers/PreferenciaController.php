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
        return view('preferencias');
    }

    public function store(PreferenciaRequest $request)
    {
        $data = $request->validated();
        $data['id_usuario'] = Auth::id();

        Preferencia::create($data);

        return redirect()->route('index')->with('success', 'Preferências salvas com sucesso!');
    }
}

