<?php
namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Models\Preferencia;
use App\Models\Quiz;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
        public function showLogin()
    {
        return view('login.login');
    }

    public function showRegister()
    {
        return view('login.cadastro');
    }

    /*public function register(AuthRequest $req) {
        User::create([
            'name' => $req->name,
            'email' => $req->email,
            'nivel_acesso' => $req->nivel_acesso,
            'escolaridade' => $req->escolaridade,
            'data_nasc' => $req->data_nasc,
            'password' => Hash::make($req->password),
        ]);
        return redirect()->route('login')->with('success', 'Cadastro realizado!');
    }*/

    public function login(Request $req) {
        if($req->isMethod('POST')) {
            if(Auth::attempt($req->only('email','password'))) {
                return redirect()->route('inicio');
            }
        }
        return view('login.login');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
    public function store(AuthRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'nivel_acesso' => $request->nivel_acesso,
            'escolaridade' => $request->escolaridade,
            'data_nasc' => $request->data_nasc,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        return redirect()->route('preferencias.create');
   
    }


    public function inicio()
{
    $user = Auth::user();
    $preferencias = $user->preferencia;

    $disciplinasPreferidas = [];

    if ($preferencias) {
        foreach ($preferencias->getAttributes() as $campo => $valor) {
            if (str_starts_with($campo, 'peso_') && $valor > 0) {
                $disciplinasPreferidas[] = str_replace('peso_', '', $campo);
            }
        }
    }

    // Filtra quizzes com base nas disciplinas preferidas
    $quizzes = Quiz::whereIn('disciplina', $disciplinasPreferidas)->latest()->take(10)->get();

    $dados = [];
        foreach($quizzes as $quiz){
            $dados[] = [
                'quiz'=>$quiz,
                'criador'=>User::find($quiz->id_criador)
            ];
        }
        return view('main.inicio', [
            'dados'=> $dados,
        ]);

}
}

