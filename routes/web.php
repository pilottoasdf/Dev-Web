<?php

use Illuminate\Support\Facades\Route;


Route::get('/login', function () {
    return view('login');
});


Route::get('/cadastro', function () {
    return view('cadastro');
});