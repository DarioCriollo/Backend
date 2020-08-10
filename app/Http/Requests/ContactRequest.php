<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'name'=>'required|max:50',
            'email'=>'required|email|max:30',
            'state'=>'required|max:30',
            'parish'=>'required|max:50'
        ];
    }
    public function messages()
    {
        return [
                'name.required' => 'El nombre es obligatorio',
                'email.required' => 'El Correo es obligatorio',
                'state.required' => 'El departamento es obligatorio',
                'state.required' => 'El municipio es obligatorio',
                'email.email' => 'El Correo no es valido',

                'name.max' => 'El nombre debe contener 50 caracteres',
                'email.max' => 'El Correo debe contener 30 caracteres',
                'state.max' => 'El departamento debe contener 50 caracteres',
                'parish.max' => 'El municipio debe contener 50 caracteres',
                
            ];
    }
}
