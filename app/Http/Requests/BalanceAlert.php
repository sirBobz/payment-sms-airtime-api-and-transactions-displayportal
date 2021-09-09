<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Spatie\ValidationRules\Rules\Delimited;

class BalanceAlert extends FormRequest
{
    /**
     * @var mixed
     */
    private $threshold;
    /**
     * @var mixed
     */
    private $status;
    /**
     * @var mixed
     */
    private $email;

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
            'status' => [
                'required', 'boolean'
            ],
            'threshold' => [
                'required', 'integer', 'between:100,100000'
            ],
            'emails' => (new Delimited('email'))->max(3)->separatedBy(','),
        ];
    }

    public function messages()
    {
        return [
            'email.email' => 'Not all the given e-mails are valid.',
        ];
    }
}
