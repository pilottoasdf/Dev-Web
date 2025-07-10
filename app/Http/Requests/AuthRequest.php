<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest
{
    public function authorize() {
        return true;
    }

     public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'nivel_acesso' => 'required|in:1,2',
            'escolaridade' => 'required|string',
            'data_nasc' => 'required|date',
            'password' => 'required|string|min:6|confirmed',
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => 'nome do usuário',
            'email' => 'e-mail',
            'nivel_acesso' => 'nível de acesso',
            'escolaridade' => 'escolaridade',
            'data_nasc' => 'data de nascimento',
            'password' => 'senha',
            'password_confirmation' => 'confirmação de senha',
        ];
    }

}
