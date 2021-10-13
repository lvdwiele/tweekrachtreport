<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

final class CompanyStoreRequest extends FormRequest
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
            'name' => 'required|unique:companies',
            'email' => 'required|email',
            'address' => 'max:50',
            'place' => 'max:20',
            'zip_code' => 'max:20',
            'phone_number' => 'max:20',
        ];
    }
}
