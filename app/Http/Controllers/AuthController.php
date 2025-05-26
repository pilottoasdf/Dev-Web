<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UsuarioModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('login');
    }

    public function showRegister()
    {
        return view('cadastro');
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email|unique:usuarios,email',
            'username' => 'required|unique:usuarios,nome_usuario',
            'tipo' => 'required|in:discente,docente',
            'escolaridade' => 'nullable',
            'data_nascimento' => 'required|date',
            'password' => 'required|confirmed|min:6',
        ]);

        Usuario::create([
            'email' => $request->email,
            'nome_usuario' => $request->username,
            'nivel_acesso' => $request->tipo,
            'escolaridade' => $request->escolaridade,
            'data_nasc' => $request->data_nascimento,
            'senha' => $request->password
        ]);

        return redirect()->route('login')->with('success', 'Cadastro realizado!');
    }

    public function login(Request $request)
    {
        $credentials = [
            'nome_usuario' => $request->login,
            'senha' => $request->password
        ];

        if (Auth::attempt($credentials)) {
            return redirect()->route('dashboard');
        }

        return back()->withErrors(['login' => 'Credenciais inválidas']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}

