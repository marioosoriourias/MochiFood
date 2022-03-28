<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class StoreAddressRequest extends FormRequest
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
    public function rules(Request $request)
    {
        return [
            'city_id' => 'required',
            'address' => 'required',
            'open' => 'required',
            'closed' => 'required',
            'payments' => 'required',
            'services' => 'required',
            'phone'=> 'nullable|numeric|digits_between:10,12',
            'latitude' => 'required',
            'longitude' => 'required'
        ];
    }

    public function attributes()
    {
        return [
            'phone' => 'telefono'
        ];
    }

    
    public function messages()
    {
        return [
            'city_id.required' => 'Debe seleccionar una ciudad',
            'address.required' => 'Debe ingresar una direccion',
            'phone.required' => 'Debe ingresar un telefono',
            'payments.required' => 'Debe seleccionar por lo menos una forma de pago',
            'services.required' => 'Debe seleccionar por lo menos un servicio',
            'latitude.required' => 'Debe ingresar una latitud',
            'longitude.required' => 'Debe ingresar una longitud',
        ];
    }
}
