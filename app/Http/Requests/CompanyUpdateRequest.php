<?php

namespace App\Http\Requests;

use App\Models\Company;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

final class CompanyUpdateRequest extends FormRequest
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
        $company = $this->route('company');

        return [
            'name' => [
                'required',
                Rule::unique('companies')->ignore($company)
            ],
            'email' => 'required|email',
            'address' => 'max:50',
            'place' => 'max:20',
            'zip_code' => 'max:20',
            'phone_number' => 'max:20',
        ];
    }
}
