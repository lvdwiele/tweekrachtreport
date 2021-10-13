<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;

final class ClientStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|unique:clients|email',
            'address' => 'nullable|max:255',
            'place' => 'nullable|max:255',
            'zip_code' => 'nullable|max:20',
            'phone_number' => 'nullable|max:20',
            'company_id' => 'nullable|integer',
            'core_power_1' => 'required|integer',
            'core_power_2' => 'required|integer',
        ];
    }

    public function withValidator(Validator $validator)
    {
        $validator->after(function (Validator $validator) {
            $data = $validator->getData();

            $data['company_id'] = isset($data['company_id']) ? (int)$data['company_id'] : null;
            $data['core_power_1'] = (int)$data['core_power_1'];
            $data['core_power_2'] = (int)$data['core_power_2'];

            return $validator->setData($data);
        });
    }
}
