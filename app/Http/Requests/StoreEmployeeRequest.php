<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployeeRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => 'required',
            'last_name' => 'required',
            'company_id' => 'required|exists:companies,id',
            'email' => 'required|email|unique:employees,email',
            'phone_numbers' => 'required|array',
            'dietary_preference_id' => 'required|exists:dietary_preferences,id'
        ];
    }
}
