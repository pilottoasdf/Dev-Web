<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;


Route::middleware('guest')->group(function () {
    Route::get('login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('login', [AuthController::class, 'login']);

    Route::get('cadastro', [AuthController::class, 'showRegister'])->name('cadastro');
    Route::post('cadastro', [AuthController::class, 'register']);
});

Route::post('logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');


Route::get('/index', function () {
    return view('index');
})->middleware('auth')->name('index');

