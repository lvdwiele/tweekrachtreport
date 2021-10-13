<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;

class ReportStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'first_support_power' => 'required|integer',
            'second_support_power' => 'required|integer'
        ];
    }

    public function withValidator(Validator $validator): void
    {
        $validator->after(function (Validator $validator) {
            $data = $validator->getData();

            $data['first_support_power'] = (int)$data['first_support_power'];
            $data['second_support_power'] = (int)$data['second_support_power'];

            return $validator->setData($data);
        });
    }
}
