<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePaymentTypeRequest extends FormRequest
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
            'name' => 'required|unique:payments'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Debe ingresar el nombre de un tipo de pago',
            'name.unique' => 'Ya existe un tipo de pago con ese nombre',
        ];
    }
}
