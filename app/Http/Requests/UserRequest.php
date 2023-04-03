<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string'],
            'email' => ['required', 'email:filter,rfc,dns', 'unique:users,email'],
            'password' => ['required', 'string']
        ];
    }

    public function messages() : array
    {
        return [
            'name.required' => 'O nome é obrigatório.', 
            'email.required' => 'O email é obrigatório.',
            'email.email' => 'O email não é válido.',
            'email.unique' => 'O email já está cadastrado.',
            'password.required' => 'A senha é obrigatória.'
        ];
    }
}
