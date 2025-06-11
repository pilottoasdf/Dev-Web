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
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:4',
            'nivel_acesso' => 'required|in:1,2',
            'escolaridade' => 'nullable|string',
            'data_nasc' => 'nullable|date_format:Y-m-d|before:today'
        ];
    }

}
