<?php

namespace App\Http\Controllers;

use App\Models\ProgressoQuiz;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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

    public function insereFoto(){
        $user = Auth::user();

        return view('user-info.foto', ['user'=>$user]);
    }

    public function uploadFoto(Request $request){
        $user = Auth::user();

        $request->validate(['foto_perfil' => 'bail|nullable|image|mimes:png.jpeg,jpg,gif|max:2048']);

        if($request->hasFile('foto_perfil')){
            if(isset($user->foto_perfil)){
                Storage::delete('public/' . $user->foto_perfil);
            }

            $img = $request->file('foto_perfil')->store('fotos_perfil', 'public');
            $user->foto_perfil = $img;
            $user->save();
        }

        return redirect()->route('perfil.info')->with('success', 'Atualizado com sucesso!');
    }

    public function removeFoto(){
        $user = Auth::user();

        Storage::disk('public')->delete($user->foto_perfil);
        $user->foto_perfil = null;
        $user->save();
        return redirect()->route('perfil.info');
    }
}
