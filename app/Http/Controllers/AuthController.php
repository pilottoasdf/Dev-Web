<?php
namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Models\Jogo;
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
    if ($req->isMethod('POST')) {
        if (Auth::attempt($req->only('email','password'))) {
            return redirect()->route('inicio');
        }

        return back()
            ->withErrors(['email' => 'Login ou senha inválidos.'])
            ->withInput(); // mantém o campo preenchido
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

private function sanitizeDisciplina($disciplina)
{
    $disciplinaSemAcento = iconv('UTF-8', 'ASCII//TRANSLIT', $disciplina);
    return strtolower(preg_replace('/[^a-z]/', '', $disciplinaSemAcento));
}

    public function inicio()
{
    $user = Auth::user();
    $preferencias = $user->preferencia;

    $disciplinasPreferidas = [];

    if ($preferencias) {
        foreach ($preferencias->getAttributes() as $campo => $valor) {
            if (str_starts_with($campo, 'peso_') && $valor > 0) {
                $disciplina = str_replace('peso_', '', $campo);
                $disciplinasPreferidas[] = $this->sanitizeDisciplina($disciplina);
            }
        }
    }

    // Filtra quizzes com base nas disciplinas preferidas
    $quizzes = Quiz::whereIn('disciplina', $disciplinasPreferidas)->latest()->take(10)->get();
    $dadosQuizzes = [];
    foreach($quizzes as $quiz){
        $dadosQuizzes[] = [
            'quiz'=>$quiz,
            'criador'=>User::find($quiz->id_criador)
        ];
    }

    // Filtra jogos com base nas disciplinas preferidas
    $jogos = Jogo::whereIn('disciplina', $disciplinasPreferidas)->latest()->take(10)->get();
    $dadosJogos = [];
    foreach($jogos as $jogo){
        $dadosJogos[] = [
            'jogo'=>$jogo,
            'criador'=>User::find($jogo->id_criador)
        ];
    }

    return view('main.inicio', [
        'dados'=> $dadosQuizzes,
        'dadosJogos' => $dadosJogos,
    ]);

}
}

