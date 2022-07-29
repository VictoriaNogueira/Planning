<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class AmountRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        return [
            'description' => 'required',
            'value' => 'required',
            //'tipo' => 'required',
        ];

    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success'   => false,
            'message'   => 'Erros',
            'data'      => $validator->errors()
        ]));
    }


    public function messages()
    {
        return [
            'description.required' => 'O campo descrição é obrigatório!',
            'value.required' => 'O campo valor é obrigatório!',
            //'tipo.required' => 'O campo tipo é obrigatório!',
        ];
    }
}
