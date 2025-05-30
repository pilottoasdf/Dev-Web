<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PreferenciaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
{
    return [
        'peso_portugues' => 'nullable|boolean',
        'peso_matematica' => 'nullable|boolean',
        'peso_fisica' => 'nullable|boolean',
        'peso_quimica' => 'nullable|boolean',
        'peso_biologia' => 'nullable|boolean',
        'peso_historia' => 'nullable|boolean',
        'peso_geografia' => 'nullable|boolean',
        'peso_filosofia' => 'nullable|boolean',
        'peso_sociologia' => 'nullable|boolean',
        'peso_ingles' => 'nullable|boolean',
    ];
}
}
