<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryRequest extends FormRequest
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
        $category = $this->route('category');
        return [
            'name' => 'required|unique:categories,name,' . $category->id
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Debe ingresar el nombre de una categoria',
            'name.unique' => 'Ya existe una categoria con ese nombre',
        ];
    }
}
