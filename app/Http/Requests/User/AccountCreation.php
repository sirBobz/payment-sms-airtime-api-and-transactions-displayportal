<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class AccountCreation extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'min:3', 'max:55'],
            'email' => ['required', 'string', 'email', 'min:6', 'max:40', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'max:30', 'confirmed'],
            'organization' => ['required', 'string','min:3', 'max:55'],
            'phone_number' => ['required','digits_between:9,12'],
        ];
    }
}
