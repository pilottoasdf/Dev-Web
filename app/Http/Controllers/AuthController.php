<?php
namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use Illuminate\Http\Request;
use App\Models\UsuarioModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
        public function showLogin()
    {
        return view('auth.login');
    }

    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(AuthRequest $req) {
        User::create($req->all());
        return redirect()->route('login')->with('success', 'Cadastro realizado!');
    }

    public function login(Request $req) {
        if($req->isMethod('POST')) {
            if(Auth::attempt($req->only('email','password'))) {
                return redirect()->route('autentica');
            }
        }
        return view('autentica.login');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
    public function store(AuthRequest $request): RedirectResponse
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'nome_usuario' => $request->nome_usuario,
            'nivel_acesso' => $request->nivel_acesso,
            'escolaridade' => $request->escolaridade,
            'data_nasc' => $request->data_nasc,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

    return redirect(RouteServiceProvider::HOME);
    }
}

