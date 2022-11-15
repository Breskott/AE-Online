<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarStoreRequest extends FormRequest
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
            'category_id' => ['required', 'exists:categories,id'],
            'placa' => ['required', 'max:255', 'string'],
            'km' => ['required', 'numeric'],
            'cor' => ['required', 'max:255', 'string'],
            'marca' => ['required', 'max:255', 'string'],
            'modelo' => ['required', 'max:255', 'string'],
            'ano' => ['required', 'numeric'],
        ];
    }
}
