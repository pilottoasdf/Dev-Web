<?php
use App\Http\Controllers\AuthController;

Route::get('/login', [AuthController::class,
 'showLogin'])->name('login');
Route::post('/login', [AuthController::class,
 'login']);

Route::get('/cadastro', [AuthController::class,
 'showRegister'])->name('cadastro');
Route::post('/cadastro', [AuthController::class,
 'register']);

Route::get('/logout', [AuthController::class,
 'logout'])->name('logout');

 Route::get('/index', function () {
    return view('index'); // resources/views/index.blade.php
})->middleware('auth')->name('index');

