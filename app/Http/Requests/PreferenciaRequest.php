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

public function withValidator($validator)
{
    $validator->after(function ($validator) {
        $input = $this->all();
        $marcou = false;

        foreach ($input as $key => $value) {
            if (str_starts_with($key, 'peso_') && $value == '1') {
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