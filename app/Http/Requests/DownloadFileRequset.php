<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DownloadFileRequset extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            "linkFile"=>"string|required"
        ];
    }

    public function messages(): array
    {
        return [
            "linkFile.string"=>"The Link File Must be String",
            "linkFile.required"=>"The Link File Is Required"
        ];
    }
}