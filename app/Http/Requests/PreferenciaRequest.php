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
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
{
    return [
        'peso_portugues' => 'nullable|integer',
        'peso_matematica' => 'nullable|integer',
        'peso_fisica' => 'nullable|integer',
        'peso_quimica' => 'nullable|integer',
        'peso_biologia' => 'nullable|integer',
        'peso_historia' => 'nullable|integer',
        'peso_geografia' => 'nullable|integer',
        'peso_filosofia' => 'nullable|integer',
        'peso_sociologia' => 'nullable|integer',
        'peso_ingles' => 'nullable|integer',
    ];
}

public function withValidator($validator)
{
    $validator->after(function ($validator) {
        $input = $this->all();
        $marcou = false;

        foreach ($input as $key => $value) {
            if (str_starts_with($key, 'peso_') && $value == '5') {
                $marcou = true;
                break;
            }
        }

        if (!$marcou) {
            $validator->errors()->add('preferencias', 'Você deve selecionar pelo menos uma preferência.');
        }
    });
}
}