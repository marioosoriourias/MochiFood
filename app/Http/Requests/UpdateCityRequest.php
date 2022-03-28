<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCityRequest extends FormRequest
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
        $city = $this->route('city');
        return [
            'name' => 'required|unique:cities,name,' . $city->id
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Debe ingresar el nombre de una ciudad',
            'name.unique' => 'Ya existe una ciudad con ese nombre',
        ];
    }
}
