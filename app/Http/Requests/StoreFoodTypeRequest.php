<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFoodTypeRequest extends FormRequest
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
            'name' => 'required|unique:food_types'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Debe ingresar el nombre de un tipo de comida',
            'name.unique' => 'Ya existe un tipo de comida con ese nombre',
        ];
    }
}
