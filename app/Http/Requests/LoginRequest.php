<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class LoginRequest extends FormRequest
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
            'email' => 'required|email',
            'password' => 'required|min:6',
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
            'email.required' => 'Campo obrigatório!',
            'email.email' => 'Email inválido!',
            'password.required' => 'Campo obrigatório!',
            'password.min' => 'A senha deve conter ao menos 6 caracteres!',
        ];
    }
}
