<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreImageRequest extends FormRequest
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
            'name' => 'required',
            'description' => 'required',
            'file' => 'required|image'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Debe ingresar el nombre a la imagen',
            'name.required' => 'Debe ingresar una descripcion a la imagen',
            'file.required' => 'Debe seleccionar una imagen',
            'file.image' => 'El archivo seleccionado debe de ser una imagen'
        ];
    }
}
