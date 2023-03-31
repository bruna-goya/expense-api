<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExpenseRequest extends FormRequest
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
            'description' => ['required', 'string', 'max:191'],
            'date' => ['required', 'date', 'before_or_equal:today'],
            'value' => ['required', 'between:00000000.01,99999999.99', 'numeric'],
            'user_id' => ['required', 'int', 'exists:users,id']
        ];
    }

    public function messages()
    {
        return [
            'description.required' => 'O campo de descrição é orbigatório.',
            'description.max' => 'O campo de descrição não pode ultrapassar 191 caracteres.',
            'date.required' => 'O campo de data é obrigatório.',
            'date.date' => 'O campo de data não é uma data válida.',
            'date.before_or_equal' => 'O campo de data não pode ser futuro.',
            'value.required' => 'O campo de valor é obrigatório.',
            'value.between' => 'O campo de valor deve ser positivo.',
            'user_id.required' => 'O usuário é obrigatóirio.',
            'user_id.exists' => 'O usuário não existe.'
        ];
    }
}
