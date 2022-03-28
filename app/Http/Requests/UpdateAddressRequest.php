<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAddressRequest extends FormRequest
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
            'city_id' => 'required',
            'address' => 'required',
            'phone'=> 'nullable|numeric|digits_between:10,12',
            'open' => 'required',
            'closed' => 'required',
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
            'latitude.required' => 'Debe ingresar una latitud',
            'longitude.required' => 'Debe ingresar una longitud',
        ];
    }
}
