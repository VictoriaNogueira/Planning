<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class UserRequest extends FormRequest
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
            'name' => 'required',
            'cpf' => 'nullable|min:11|unique:users',
            'sex' => 'nullable|in:F,M',
            'email' => 'required|email',
            'password' => 'required|min:6',
            'password_confirmation' => 'required|same:password'
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
            'name.required' => 'O campo nome é obrigatório!',
            'cpf.min' => 'CPF inválido!',
            'cpf.unique' => 'O CPF informado já está cadastrado!',
            'sex.in' => 'O campo Sexo deve ser Masculino ou Feminino',
            'email.required' => 'O campo Email é obrigatório.',
            'email.email' => 'Email inválido.',
            'password.required' => 'O campo Senha é obrigatório!',
            'password.min' => 'A senha deve conter ao menos 6 caracteres!',
            'password_confirmation.required' => 'A confirmação de senha é obrigatória!',
            'password_confirmation.same' => 'As senhas devem ser iguais.'
        ];
    }
}
