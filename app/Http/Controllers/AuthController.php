<?php
namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Models\Jogo;
use App\Models\Preferencia;
use App\Models\Quiz;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\AbertosRecentemente;

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

    public function login(Request $req)
    {
        if ($req->isMethod('POST')) {
            if (Auth::attempt($req->only('email','password'))) {
                return redirect()->route('inicio');
            }

            return back()
                ->withErrors(['email' => 'Login ou senha inválidos.'])
                ->withInput();
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

        $quizzes = Quiz::whereIn('disciplina', $disciplinasPreferidas)->latest()->take(10)->get();
        $dadosQuizzes = [];
        foreach($quizzes as $quiz){
            $dadosQuizzes[] = [
                'quiz'=>$quiz,
                'criador'=>User::find($quiz->id_criador)
            ];
        }

        $jogos = Jogo::whereIn('disciplina', $disciplinasPreferidas)->latest()->take(10)->get();
        $dadosJogos = [];
        foreach($jogos as $jogo){
            $dadosJogos[] = [
                'jogo'=>$jogo,
                'criador'=>User::find($jogo->id_criador)
            ];
        }

        $abertosRecentemente = AbertosRecentemente::where('id_usuario', $user->id)
            ->with(['quiz', 'jogo'])
            ->latest()
            ->take(5)
            ->get();

        return view('main.inicio', [
            'dados'=> $dadosQuizzes,
            'dadosJogos' => $dadosJogos,
            'abertosRecentemente' => $abertosRecentemente
        ]);
    }
}
