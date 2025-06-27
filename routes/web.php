<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PerfilController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PreferenciaController;
use App\Http\Controllers\ProgressoController;
use App\Http\Controllers\ProjetoController;
use App\Http\Controllers\QuizController;

Route::redirect('/','inicio');

Route::middleware('guest')->group(function () {
    Route::get('login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('login', [AuthController::class, 'login'])->name('autenticar');

    Route::get('cadastro', [AuthController::class, 'showRegister'])->name('cadastro');
    Route::post('cadastro', [AuthController::class, 'store'])->name('cadastrar');
});

Route::middleware('auth')->group(function () {
    Route::get('/preferencias', [PreferenciaController::class, 'create'])->name('preferencias.create');
    Route::post('/preferencias', [PreferenciaController::class, 'store'])->name('preferencias.store');

    Route::get('logout', [AuthController::class, 'logout'])
        ->middleware('auth')
        ->name('logout');

    Route::get('/index', function () {
        return view('index');
    })->middleware('auth')->name('index');

    Route::get('forcar-logout', function () {
        \Illuminate\Support\Facades\Auth::logout();
        return redirect('/login');
    })->name('forcar-logout'); // só pra fazer logout

    Route::get('inicio', [AuthController::class, 'inicio'])->name('inicio');

    Route::get('meus-projetos', [ProjetoController::class, 'showProjetos'])->middleware('auth')->name('projetos');
    Route::get('criar-projeto', [ProjetoController::class, 'create'])->middleware('auth')->name('projetos.create');
    Route::post('criar-projeto', [ProjetoController::class, 'createQuizJogo'])->middleware('auth')->name('quiz-jogo.create');

    Route::post('criar-quiz', [QuizController::class, 'store'])->middleware('auth')->name('quiz.store');
    Route::get('quiz/{id}', [QuizController::class, 'loadQuiz'])->middleware('auth')->name('quiz.load');

    Route::post('progresso/create', [ProgressoController::class, 'create'])->middleware('auth')->name('progresso.create');
    Route::get('ranking', [ProgressoController::class, 'ranking'])->middleware('auth')->name('ranking');

    Route::get('quizzes', [ProjetoController::class, 'showQuizzes'])->middleware('auth')->name('quizzes.lista');

    Route::get('perfil', [PerfilController::class, 'infoPerfil'])->middleware('auth')->name('perfil.info');
    Route::get('perfil/info', [PerfilController::class, 'infoUser'])->middleware('auth')->name('user.info');

    Route::get('perfil/info/editar', [PerfilController::class, 'editaInfo'])->middleware('auth')->name('user.editar');
    Route::put('perfil/info/editar', [PerfilController::class, 'atualizaInfo'])->middleware('auth')->name('user.atualizar');

});
