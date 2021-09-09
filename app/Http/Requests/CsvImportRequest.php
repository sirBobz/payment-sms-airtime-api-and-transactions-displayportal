<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CsvImportRequest extends FormRequest
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
            'import_file' => 'required|mimes:csv,txt|file|max:10000',
            'reference_name' => 'required|max:50',
            'send_date' => 'required|date_format:Y-m-d',
            'send_time' => 'required|date_format:H:i',
            'message' => 'required|max:480',
            'sender_id' => 'required|max:11'
        ];
    }

    public function messages(): array
    {
        return [
            'import_file.mimes' => 'The :attribute field must be of the type CSV.',
            'send_date.date_format' => 'The :attribute field must be of the format ' . date('Y-m-d'),
            'send_time.date_format' => 'The :attribute field must be of the format ' . date('H:i'),
        ];
    }

}
