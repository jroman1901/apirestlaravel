<?php

namespace App\Http\Requests\v1;

use Illuminate\Foundation\Http\FormRequest;

class EstudianteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'nombres' => 'required|max:70',
            'apellidos' => 'required|image|max:1024',
            'direccion' => 'required|max:2000',
            'telefono' => 'required|max:13',
        ];
    }
}
