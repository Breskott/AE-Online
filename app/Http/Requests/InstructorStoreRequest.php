<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InstructorStoreRequest extends FormRequest
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
            'nome' => ['nullable', 'max:255', 'string'],
            'cpf' => ['required', 'max:11', 'string'],
            'rg' => ['required', 'max:9', 'string'],
            'telefone' => ['required', 'max:255', 'string'],
            'celular' => ['required', 'max:255', 'string'],
            'credencial' => ['required', 'max:255', 'string'],
            'email' => ['required', 'email'],
        ];
    }
}