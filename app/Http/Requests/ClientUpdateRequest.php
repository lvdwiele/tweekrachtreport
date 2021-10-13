<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;

final class ClientUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'first_name' => 'required|max:25',
            'last_name' => 'required|max:25',
            'email' => 'required|email',
            'address' => 'nullable|max:50',
            'place' => 'nullable|max:20',
            'zip_code' => 'nullable|max:20',
            'phone_number' => 'nullable|max:20',
            'company_id' => 'nullable|integer',
            'core_power_1' => 'sometimes|required|integer',
            'core_power_2' => 'sometimes|required|integer',
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
