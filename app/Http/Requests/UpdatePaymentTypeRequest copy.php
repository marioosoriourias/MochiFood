<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Payment;

class UpdatePaymentTypeRequest extends FormRequest
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
        $payment = Payment::find($this->route('type_payment'));
        return [
            'name' => 'required|unique:payments,name,' . $payment->id
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
