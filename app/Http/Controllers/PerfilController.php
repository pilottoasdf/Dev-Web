<?php

namespace App\Http\Controllers;

use App\Models\ProgressoQuiz;
use App\Models\AbertosRecentemente;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PerfilController extends Controller
{
    public function infoPerfil()
    {
        $user = Auth::user();
        $progressos = ProgressoQuiz::select(DB::raw('sum(trofeu) as total'), DB::raw('AVG(pontos) as media_pontos'))
            ->where('id_usuario', $user->id)
            ->groupBy('id_usuario')
            ->get();

        // Buscar os quizzes/jogos abertos recentemente
        $abertosRecentemente = AbertosRecentemente::where('id_usuario', $user->id)
            ->with('quiz')
            ->latest()
            ->take(5) // Limitar a 5 itens
            ->get();

        return view('user-info.perfil', [
            'user' => $user,
            'progressos' => $progressos,
            'abertosRecentemente' => $abertosRecentemente,
        ]);
    }

    public function infoUser ()
    {
        $user = Auth::user();
        $date = date_create($user->data_nasc);
        return view('user-info.infos', ['user' => $user, 'date' => date_format($date, "d/m/Y")]);
    }

    public function editaInfo()
    {
        $user = Auth::user();
        $date = date_create($user->data_nasc);
        return view('user-info.editar', ['user' => $user, 'date' => date_format($date, "d/m/Y")]);
    }

    public function atualizaInfo(Request $request)
    {
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
