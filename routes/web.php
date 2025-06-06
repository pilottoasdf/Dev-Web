<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PreferenciaController;


Route::middleware('guest')->group(function () {
    Route::get('login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('login', [AuthController::class, 'login'])->name('autenticar');

    Route::get('cadastro', [AuthController::class, 'showRegister'])->name('cadastro');
    Route::post('cadastro', [AuthController::class, 'store'])->name('cadastrar');
});

Route::middleware('auth')->group(function () {
    Route::get('/preferencias', [PreferenciaController::class, 'create'])->name('preferencias.create');
    Route::post('/preferencias', [PreferenciaController::class, 'store'])->name('preferencias.store');

Route::post('logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

Route::get('/index', function () {
    return view('index');
})->middleware('auth')->name('index');

Route::get('forcar-logout', function () {
    \Illuminate\Support\Facades\Auth::logout();
    return redirect('/login');
})->name('forcar-logout'); // só pra fazer logout

Route::get('teste', [AuthController::class, 'teste'])->name('teste');

});