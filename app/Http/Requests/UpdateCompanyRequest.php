<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCompanyRequest extends FormRequest
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
        $company= $this->route('company');  

        return [     
                'name' => 'required|unique:companies,name,' . $company->id,
                'description' => 'required',
                'website' => 'nullable|url',
                'food_type_id' => 'required',
                'categories' => 'required',
                'file' => 'image'
        ];
    }


    public function messages()
    {
        return [
            'name.required' => 'Debe ingresar el nombre de una empresa',
            'name.unique' => 'Ya existe una empresa con ese nombre',
            'description.required' => 'Debe ingresar una descripcion',
            'website.url' => 'Debe ingresar una url con formato valido. Ejemplo: http://www.example.com/',
            'food_type_id' => 'Debe seleccionar un tipo de comida',
            'categories.required' =>'Debe seleccionar por lo menos una categoria',
            'file.image' => 'El archivo seleccionado debe de ser una imagen'
        ];
    }
}
