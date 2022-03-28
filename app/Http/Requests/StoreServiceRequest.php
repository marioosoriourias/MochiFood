<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreServiceRequest extends FormRequest
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
            'name' => 'required|unique:services'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Debe ingresar el nombre de un servicio',
            'name.unique' => 'Ya existe un servicio con ese nombre',
        ];
    }
}
