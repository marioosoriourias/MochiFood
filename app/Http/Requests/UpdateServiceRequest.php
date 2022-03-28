<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Service;

class UpdateServiceRequest extends FormRequest
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
        $service = Service::find($this->route('service'));
    
        return [
            'name' => 'required|unique:services,name,' . $service->id
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
