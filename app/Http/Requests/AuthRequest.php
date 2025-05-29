<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest
{
    public function authorize() {
        return true;
    }

    public function rules() {
        return [
            'name' => 'required|string|max:255',
            'nome_usuario' => 'required|string|max:255|unique:users,nome_usuario',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:4',
            'nivel_acesso' => 'required|in:0,1',
            'escolaridade' => 'nullable|string',
            'data_nasc' => 'nullable|date'
        ];
    }

}
