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
            'value' => ['required', 'between:00000000.01,99999999.99', 'required', 'numeric'],
            'user_id' => ['required', 'int', 'exists:users,id']
        ];
    }
}
