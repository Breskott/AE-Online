<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProgressStoreRequest extends FormRequest
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
            'student_id' => ['required', 'exists:students,id'],
            'car_id' => ['required', 'exists:cars,id'],
            'instructor_id' => ['required', 'exists:instructors,id'],
            'abastecimento' => ['required', 'max:255', 'string'],
            'valor' => ['nullable', 'string'],
            'hora_ini' => ['required', 'max:255', 'string'],
            'hora_fim' => ['required', 'max:255', 'string'],
        ];
    }
}
