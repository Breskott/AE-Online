<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nome' => ['required', 'max:255', 'string'],
            'cpf' => ['required', 'max:11', 'string'],
            'rg' => ['required', 'max:9', 'string'],
            'telefone' => ['required', 'max:255', 'string'],
            'celular' => ['required', 'max:255', 'string'],
            'rua' => ['required', 'max:255', 'string'],
            'numero' => ['required', 'max:255', 'string'],
            'bairro' => ['required', 'max:255', 'string'],
            'cidade' => ['required', 'max:255', 'string'],
            'status_aula' => ['required', 'max:255', 'string'],
        ];
    }
}
